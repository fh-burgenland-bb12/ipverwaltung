<?php
namespace Web\Event;
use Zend\Mvc\MvcEvent;
use Zend\EventManager\Event;

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole;
use Zend\Permissions\Acl\Resource\GenericResource;

class Auth extends MvcEvent
{
    const ROLE_GUEST='guest';
    protected $debug = false;

    protected function log($msg)
    {
        if($this->debug) error_log($msg);
    }
    public function listen(Event $e)
    {
        $event = $e->getName();
        if($event == 'bootstrap')
        {
            $this->initAcl($e);
        }
        elseif($event == 'dispatch')
        {
            $this->checkAcl($e);
        }
    }

    protected function initAcl(MvcEvent $e) {

        $acl = new Acl();
        //$roles = include __DIR__ . '/config/module.acl.roles.php';
        $roles = $this->getDbRoles($e);
        $allResources = array();
        foreach ($roles as $role => $resources) {

            $role = new GenericRole($role);
            $acl -> addRole($role);

            //$allResources = array_merge($resources, $allResources);

            //adding resources
            foreach ($resources as $resource) {
                if(!$acl ->hasResource($resource))
                    $acl -> addResource(new GenericResource($resource));
                $acl -> allow($role, $resource);
            }
            //adding restrictions
            //foreach ($allResources as $resource) {
            //}
        }
        //setting to view
        $e -> getViewModel() -> acl = $acl;
        //echo "<pre>";var_dump($acl);exit();

    }


    public function getDbRoles(MvcEvent $e){
        // I take it that your adapter is already configured
        $dbAdapter = $e->getApplication()->getServiceManager()->get('Zend\Db\Adapter\Adapter');

        $sql = new \Zend\Db\Sql\Sql($dbAdapter);
        $select = $sql->select('permission');
        $select->columns(array( 'module','controller','action'))
            ->join('groupPermission','permission.permissionId = groupPermission.permissionId',array())
            ->join('group','group.groupId = groupPermission.groupId',array('role'=>'name'))
        ;
        //$this->log($select->getSqlString());

        $stmt = $sql->prepareStatementForSqlObject($select);
        $results = $stmt->execute();
        // making the roles array
        $roles = array();
        foreach($results as $result){
            $roles[$result['role']][] = $result['module'].($result['controller']?'-'.$result['controller']:'').($result['action']?'-'.$result['action']:'');
        }
        $this->log('ACL Rules: '.var_export($roles,true));
        return $roles;
    }

    public function checkAcl(MvcEvent $e) {
        $route = $e->getRouteMatch()->getMatchedRouteName();
        error_log("Route: $route");
        //you set your role

        $userRoles = $this->getAuthRole($e);

        $this->log('User Roles: '.var_export($userRoles,true));

        foreach($userRoles as $userRole)
        {
            try{
                $isAllowed = $e -> getViewModel() -> acl -> isAllowed($userRole['name'], $route);
                $response = $e -> getResponse();
                if($isAllowed)
                {
                    break;
                }
            }
            catch(\Exception $err)
            {
                error_log($err->getMessage());
                //$response = $e->getMessage();
                $response = new \Zend\Http\Response();
                $response->setContent("<html><body>".$err->getMessage()."</body></html>");
                $isAllowed = false;
            }
        }
        $this->log('is allowed: '.var_export($isAllowed,true));
        $this->log('has identity: '.var_export($e->getApplication()->getServiceManager()->get('Web\Auth\Service')->hasIdentity(),true));
        if (!$isAllowed) {
            //if ($e -> getViewModel() -> acl ->hasResource($route) && !$e -> getViewModel() -> acl -> isAllowed($userRole, $route)) {
            //$response = $e -> getResponse();

            //location to page or what ever

            if($e->getApplication()->getServiceManager()->get('Web\Auth\Service')->hasIdentity() !== true){
                $redirect = $e -> getRequest() -> getBaseUrl() . $e->getRouter()->assemble(array(),array('name'=>'web-auth-login'));
                $response -> getHeaders() -> addHeaderLine('Location', $e -> getRequest() -> getBaseUrl() . $e->getRouter()->assemble(array(),array('name'=>'web-auth-login')));
                $response -> setStatusCode(302);
            }
            else
            {
                $redirect = $e -> getRequest() -> getBaseUrl() . $e->getRouter()->assemble(array(),array('name'=>'web-home'));
                $response -> getHeaders() -> addHeaderLine('Location', $e -> getRequest() -> getBaseUrl() . $e->getRouter()->assemble(array(),array('name'=>'web-home')));
                $response -> setStatusCode(302);
            }
        }
        if($redirect)
        {
            $controller = $e->getTarget();
            $controller->redirect()->toUrl($redirect);
            $e->stopPropagation();
        }
        //var_dump($e -> getRequest() -> getBaseUrl() . $e->getRouter()->assemble(array(),array('name'=>'web-auth-login')));exit();
        $e->setResponse($response);
        $e->stopPropagation();
    }

    protected function getAuthRole(MvcEvent $e)
    {
        $userRoles = array();
        $authAdapter = $e->getApplication()->getServiceManager()->get('Web\Auth\Service');
        if($authAdapter->hasIdentity() === true){
            //is logged in
            $id= $e->getApplication()->getServiceManager()->get('Core\Model\UserIdentity');

            $userRoles = $id->getGroups();
        }
        if($authAdapter->hasIdentity() !== true || count($userRoles)==0 ) {
            $userRoles[] = array('name'=>self::ROLE_GUEST);
        }
        $this->log("userroles: ".var_export($userRoles,true));
        return $userRoles;
    }
}
