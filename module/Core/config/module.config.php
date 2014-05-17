<?php
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

return array(
    'router' => array(
        'routes' => array(
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
        'initializers' => array(
            function ($instance, $sm) {
                if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
                    $instance->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
                }
            }
        ),
        'factories' => array(
            'Core\Model\Group' =>  function($sm) {
                $g = new Core\Model\Group();
                return $g;
            },
            'Core\Model\GroupTable' =>  function($sm) {
                $tableGateway = $sm->get('GroupTableGateway');
                $table = new \Core\Model\GroupTable($tableGateway);
                return $table;
            },
            'GroupTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Core\Model\Group'));
                return new TableGateway('auth_group', $dbAdapter, null, $resultSetPrototype);
            },

            'Core\Model\User' => function ($sm) {
                $user = new Core\Model\User();
                $user->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
                return $user;
            },
            'Core\Model\UserTable' =>  function($sm) {
                $tableGateway = $sm->get('UserTableGateway');
                $table = new \Core\Model\UserTable($tableGateway);
                return $table;
            },
            'UserTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Core\Model\User'));
                return new TableGateway('auth_user', $dbAdapter, null, $resultSetPrototype);
            },
            'Core\Model\UserIdentity' => function ($sm) {
                $as = $sm->get('Web\Auth\Service');
                if ($as->hasIdentity() === true) {
                    $user = $as->getIdentity();
                } else {
                    $user = new Core\Model\User();
                }
                $user->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
                return $user;
            },
        )
    ),
    'controllers' => array(
        'invokables' => array(
        ),
    ),
    'view_manager' => array(
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
