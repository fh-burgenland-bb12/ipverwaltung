<?php
use Zend\Session\SessionManager;
use Zend\Session\Container;

use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Listen',
                'route' => 'web-list-index',
                'pages' => array(
                    array(
                        'label' => 'Übersicht',
                        'route' => 'web-list-overview',
                        'resource' => 'mvc:web-list-overview',
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

            'web-list-index' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/list',
                    'defaults' => array(
                        'controller' => 'Web\Controller\List',
                        'action' => 'index',
                    ),
                ),
            ),

            'web-list-overview' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/list/overview',
                    'defaults' => array(
                        'controller' => 'Web\Controller\List',
                        'action' => 'overview',
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
        ),
        'initializers' => array(
            function ($instance, $sm) {
                if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
                    $instance->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
                }
            }
        ),
        'factories' => array(
            'navigation' => 'Web\Navigation\Factory',
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
