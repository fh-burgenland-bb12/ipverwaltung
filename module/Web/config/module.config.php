<?php
use Zend\Session\SessionManager;
use Zend\Session\Container;

use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\AuthenticationService;
use Web\Storage\Auth as SessionStorage;

return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Stammdaten',
                'route' => 'ipverwaltung-list-view',
                'pages' => array(
                    array(
                        'label' => 'Accesspoint',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Accesspoint'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Accesspoint Ip\'s',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'AccesspointIp'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Ansprechpartner',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Ansprechpartner'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Firewall',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Firewall'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Firewall DHCP',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'FirewallDhcp'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Firewall Interface',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'FirewallInterface'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Firewall Interface IP\'s',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'FirewallInterfaceIp'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Firewall NAT',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'FirewallNat'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Firma',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Firma'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'IPsec',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Ipsec'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'ISP',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Isp'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Land',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Land'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Server',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Server'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Standort',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Standort'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Tina VPN',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Tinavpn'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Typ',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Typ'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                    array(
                        'label' => 'Vlan',
                        'route' => 'ipverwaltung-list-view',
                        'params' => array('type'=>'Vlan'),
                        'resource' => 'mvc:ipverwaltung-list-view',
                    ),
                ),
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'web-home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Web\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'web-auth-login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'Web\Controller\Auth',
                        'action' => 'login',
                    ),
                ),
            ),
            'web-auth-logout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'Web\Controller\Auth',
                        'action' => 'logout',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
            'Zend\Authentication\AuthenticationService' => 'Web\Auth\Service',
        ),
        'initializers' => array(
            function ($instance, $sm) {
                if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
                    $instance->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
                }
            }
        ),
        'invokeables' => array(
            //'AuthService' => 'Zend\Authentication\AuthenticationService',

        ),
        'services' => array(
            'SessionManager' => 'Zend\Session\SessionManager',
            'Auth' => 'Web\Auth\Service',
            'AuthService' => 'Web\Auth\Service',
        ),
        'factories' => array(
            'navigation' => 'Web\Navigation\Factory',
            //'Zend\Authentication\AuthenticationService' => 'Zend\Authentication\AuthenticationService',
            //'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'Zend\Session\SessionManager' => function ($sm) {
                $config = $sm->get('config');
                if (isset($config['session'])) {
                    $session = $config['session'];

                    $sessionConfig = null;
                    if (isset($session['config'])) {
                        $class = isset($session['config']['class']) ? $session['config']['class'] : 'Zend\Session\Config\SessionConfig';
                        $options = isset($session['config']['options']) ? $session['config']['options'] : array();
                        $sessionConfig = new $class();
                        $sessionConfig->setOptions($options);
                    }

                    $sessionStorage = null;
                    if (isset($session['storage'])) {
                        $class = $session['storage'];
                        $sessionStorage = new $class();
                    }

                    $sessionSaveHandler = null;
                    if (isset($session['save_handler'])) {
                        // class should be fetched from service manager since it will require constructor arguments
                        $sessionSaveHandler = $sm->get($session['save_handler']);
                    }

                    $sessionManager = new SessionManager($sessionConfig, $sessionStorage, $sessionSaveHandler);

                    if (isset($session['validators'])) {
                        $chain = $sessionManager->getValidatorChain();
                        foreach ($session['validators'] as $validator) {
                            $validator = new $validator();
                            $chain->attach('session.validate', array($validator, 'isValid'));

                        }
                    }
                } else {
                    $sessionManager = new SessionManager();
                }
                Container::setDefaultManager($sessionManager);
                return $sessionManager;
            },
            'Web\Auth\Service' => function ($sm) {
                $authAdapter = new AuthAdapter($sm->get('Zend\Db\Adapter\Adapter'));
                $authAdapter
                    ->setTableName('user')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password')
                    ->setCredentialTreatment("SHA1(CONCAT('IpV2w',?,salt)) and status='active'");
                    //->setCredentialTreatment("PASSWORD(?)");

                $authService = new AuthenticationService();
                $authService->setAdapter($authAdapter);
                $authService->setStorage(new SessionStorage('user'));
                return $authService;
            },
        ),
    ),
    'translator' => array(
        'locale' => 'de_DE',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Web\Controller\Index' => 'Web\Controller\IndexController',
            'Web\Controller\Auth' => 'Web\Controller\AuthController',
            'Web\Controller\List' => 'Web\Controller\ListController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(),
        ),
    ),
);
