<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * 
 * Module Konfig File - Module: application
 */
return array(
    // Array mit allen Routen, welche im Applikation Module benötigt werden
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'actual' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/info/actual',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pc',
                        'action' => 'actual',
                    ),
                ),
            ),
            'general' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/info/general',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pc',
                        'action' => 'general',
                    ),
                ),
            ),
            'history' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/info/history',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pc',
                        'action' => 'history',
                    ),
                ),
            ),
            'location' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/info/location',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Pc',
                        'action' => 'location',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user/login',
                    'defaults' => array(
                    ),
                ),
            ),
            'register' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user/register',
                    'defaults' => array(
                    ),
                ),
            ),
            'logout' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user/logout',
                    'defaults' => array(
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    // Ende Array mit den Routen
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
     // Array für den integrierten Übersetzer
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
    // Array mit den Controllern aus dem Modul application
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Pc' => 'Application\Controller\PcController'
        ),
    ),
    // Ende Array Controller
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
            'zfcuser' => __DIR__ . '/../view', // <- eigene views login etc.
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
