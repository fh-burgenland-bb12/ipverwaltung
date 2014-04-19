<?php

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

return array(
    'router' => array(
        'routes' => array(
            'ipverwaltung-data-edit' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/edit/:type[:id]',
                    'constraints' => array(
                        'type' => '(Accesspoint(Ip)?|Firewall(Dhcp|Interface(Ip)?|Nat)?|Firma|Ipsec|Isp|Land|Server|Standort|Tinavpn|Typ|Vlan)',
                        'id'   => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Ipverwaltung\Controller\Data',
                        'action' => 'edit',
                        'id' => 0,
                    ),
                ),
            ),

            'ipverwaltung-list-view' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/view[/:type]',
                    'constraints' => array(
                        'type' => '(Accesspoint(Ip)?|Firewall(Dhcp|Interface(Ip)?|Nat)?|Firma|Ipsec|Isp|Land|Server|Standort|Tinavpn|Typ|Vlan)',
                        'id'   => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Ipverwaltung\Controller\List',
                        'action' => 'view',
                        'id' => 0,
                        'type' => 'Standort',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
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
            'Ipverwaltung\Model\Accesspoint\Accesspoint' =>  function($sm) {
                $g = new Ipverwaltung\Model\Accesspoint\Accesspoint();
                return $g;
            },
            'Ipverwaltung\Model\Accesspoint\AccesspointTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Accesspoint\AccesspointTableGateway');
                $table = new Ipverwaltung\Model\Accesspoint\AccesspointTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Accesspoint\AccesspointTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Accesspoint\Accesspoint'));
                return new TableGateway('accesspoint', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\AccesspointIp\AccesspointIp' =>  function($sm) {
                $g = new Ipverwaltung\Model\AccesspointIp\AccesspointIp();
                return $g;
            },
            'Ipverwaltung\Model\AccesspointIp\AccesspointIpTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\AccesspointIp\AccesspointIpTableGateway');
                $table = new Ipverwaltung\Model\AccesspointIp\AccesspointIpTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\AccesspointIp\AccesspointIpTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\AccesspointIp\AccesspointIp'));
                return new TableGateway('accesspointIp', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Ansprechpartner\Ansprechpartner' =>  function($sm) {
                $g = new Ipverwaltung\Model\Ansprechpartner\Ansprechpartner();
                return $g;
            },
            'Ipverwaltung\Model\Ansprechpartner\AnsprechpartnerTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Ansprechpartner\AnsprechpartnerTableGateway');
                $table = new Ipverwaltung\Model\Ansprechpartner\AnsprechpartnerTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Ansprechpartner\AnsprechpartnerTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Ansprechpartner\Ansprechpartner'));
                return new TableGateway('ansprechpartner', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Firewall\Firewall' =>  function($sm) {
                $g = new Ipverwaltung\Model\Firewall\Firewall();
                return $g;
            },
            'Ipverwaltung\Model\Firewall\FirewallTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Firewall\FirewallTableGateway');
                $table = new Ipverwaltung\Model\Firewall\FirewallTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Firewall\FirewallTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Firewall\Firewall'));
                return new TableGateway('firewall', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\FirewallDhcp\FirewallDhcp' =>  function($sm) {
                $g = new Ipverwaltung\Model\FirewallDhcp\FirewallDhcp();
                return $g;
            },
            'Ipverwaltung\Model\FirewallDhcp\FirewallDhcpTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\FirewallDhcp\FirewallDhcpTableGateway');
                $table = new Ipverwaltung\Model\FirewallDhcp\FirewallDhcpTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\FirewallDhcp\FirewallDhcpTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\FirewallDhcp\FirewallDhcp'));
                return new TableGateway('firewallDhcp', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\FirewallInterface\FirewallInterface' =>  function($sm) {
                $g = new Ipverwaltung\Model\FirewallInterface\FirewallInterface();
                return $g;
            },
            'Ipverwaltung\Model\FirewallInterface\FirewallInterfaceTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\FirewallInterface\FirewallInterfaceTableGateway');
                $table = new Ipverwaltung\Model\FirewallInterface\FirewallInterfaceTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\FirewallInterface\FirewallInterfaceTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\FirewallInterface\FirewallInterface'));
                return new TableGateway('firewallInterface', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\FirewallInterfaceIp\FirewallInterfaceIp' =>  function($sm) {
                $g = new Ipverwaltung\Model\FirewallInterfaceIp\FirewallInterfaceIp();
                return $g;
            },
            'Ipverwaltung\Model\FirewallInterfaceIp\FirewallInterfaceIpTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\FirewallInterfaceIp\FirewallInterfaceIpTableGateway');
                $table = new Ipverwaltung\Model\FirewallInterfaceIp\FirewallInterfaceIpTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\FirewallInterfaceIp\FirewallInterfaceIpTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\FirewallInterfaceIp\FirewallInterfaceIp'));
                return new TableGateway('firewallInterfaceIp', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\FirewallNat\FirewallNat' =>  function($sm) {
                $g = new Ipverwaltung\Model\FirewallNat\FirewallNat();
                return $g;
            },
            'Ipverwaltung\Model\FirewallNat\FirewallNatTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\FirewallNat\FirewallNatTableGateway');
                $table = new Ipverwaltung\Model\FirewallNat\FirewallNatTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\FirewallNat\FirewallNatTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\FirewallNat\FirewallNat'));
                return new TableGateway('firewallNat', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Firma\Firma' =>  function($sm) {
                $g = new Ipverwaltung\Model\Firma\Firma();
                return $g;
            },
            'Ipverwaltung\Model\Firma\FirmaTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Firma\FirmaTableGateway');
                $table = new Ipverwaltung\Model\Firma\FirmaTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Firma\FirmaTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Firma\Firma'));
                return new TableGateway('firma', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Ipsec\Ipsec' =>  function($sm) {
                $g = new Ipverwaltung\Model\Ipsec\Ipsec();
                return $g;
            },
            'Ipverwaltung\Model\Ipsec\IpsecTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Ipsec\IpsecTableGateway');
                $table = new Ipverwaltung\Model\Ipsec\IpsecTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Ipsec\IpsecTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Ipsec\Ipsec'));
                return new TableGateway('ipsec', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Isp\Isp' =>  function($sm) {
                $g = new Ipverwaltung\Model\Isp\Isp();
                return $g;
            },
            'Ipverwaltung\Model\Isp\IspTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Isp\IspTableGateway');
                $table = new Ipverwaltung\Model\Isp\IspTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Isp\IspTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Isp\Isp'));
                return new TableGateway('isp', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Land\Land' =>  function($sm) {
                $g = new Ipverwaltung\Model\Land\Land();
                return $g;
            },
            'Ipverwaltung\Model\Land\LandTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Land\LandTableGateway');
                $table = new Ipverwaltung\Model\Land\LandTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Land\LandTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Land\Land'));
                return new TableGateway('land', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Server\Server' =>  function($sm) {
                $g = new Ipverwaltung\Model\Server\Server();
                return $g;
            },
            'Ipverwaltung\Model\Server\ServerTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Server\ServerTableGateway');
                $table = new Ipverwaltung\Model\Server\ServerTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Server\ServerTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Server\Server'));
                return new TableGateway('server', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Standort\Standort' =>  function($sm) {
                $g = new Ipverwaltung\Model\Standort\Standort();
                return $g;
            },
            'Ipverwaltung\Model\Standort\StandortTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Standort\StandortTableGateway');
                $table = new Ipverwaltung\Model\Standort\StandortTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Standort\StandortTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Standort\Standort'));
                return new TableGateway('standort', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Tinavpn\Tinavpn' =>  function($sm) {
                $g = new Ipverwaltung\Model\Tinavpn\Tinavpn();
                return $g;
            },
            'Ipverwaltung\Model\Tinavpn\TinavpnTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Tinavpn\TinavpnTableGateway');
                $table = new Ipverwaltung\Model\Tinavpn\TinavpnTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Tinavpn\TinavpnTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Tinavpn\Tinavpn'));
                return new TableGateway('tinavpn', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Typ\Typ' =>  function($sm) {
                $g = new Ipverwaltung\Model\Typ\Typ();
                return $g;
            },
            'Ipverwaltung\Model\Typ\TypTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Typ\TypTableGateway');
                $table = new Ipverwaltung\Model\Typ\TypTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Typ\TypTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Typ\Typ'));
                return new TableGateway('typ', $dbAdapter, null, $resultSetPrototype);
            },            'Ipverwaltung\Model\Vlan\Vlan' =>  function($sm) {
                $g = new Ipverwaltung\Model\Vlan\Vlan();
                return $g;
            },
            'Ipverwaltung\Model\Vlan\VlanTable' =>  function($sm) {
                $tableGateway = $sm->get('Ipverwaltung\Model\Vlan\VlanTableGateway');
                $table = new Ipverwaltung\Model\Vlan\VlanTable($tableGateway);
                return $table;
            },
            'Ipverwaltung\Model\Vlan\VlanTableGateway' => function ($sm) {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype($sm->get('Ipverwaltung\Model\Vlan\Vlan'));
                return new TableGateway('vlan', $dbAdapter, null, $resultSetPrototype);
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
            'Ipverwaltung\Controller\Data' => 'Ipverwaltung\Controller\DataController',
            'Ipverwaltung\Controller\List' => 'Ipverwaltung\Controller\ListController',
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
