<?php

// For PHP <= 5.4, you should replace any ::class references with strings
// remove the first \ and the ::class part and encase in single quotes
return array(
    'doctrine' => array(
        'driver' => array(
// overriding zfc-user-doctrine-orm's config
            'zfcuser_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => './module/Backend/src/Backend/Entity'
//'paths' => array(__DIR__ . '/../src/'.__NAMESPACE__.'/Entity'),
//'paths' => 'path/to/your/entities/dir'
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Backend' => 'zfcuser_entity', //<----?
                ),
            ),
        ),
    ),
    'zfcuser' => array(
// telling ZfcUser to use our own class
        'user_entity_class' => 'Backend\Entity\User',
        // telling ZfcUserDoctrineORM to skip the entities it defines
        'enable_default_entities' => false,
        'new_user_default_role' => 'user',
    ),
    'bjyauthorize' => array(
// Using the authentication identity provider, which basically reads the roles from the auth service's identity
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
        'role_providers' => array(
// using an object repository (entity repository) to load all roles into our ACL
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'Backend\Entity\Role',
            ),
        ),
        'guards' => [
            /* If this guard is specified here (i.e. it is enabled], it will block
             * access to all controllers and actions unless they are specified here.
             * You may omit the 'action' index to allow access to the entire controller
             */
            \BjyAuthorize\Guard\Controller::class => [
//                ['controller' => 'index', 'action' => 'index', 'roles' => ['guest','user']],
//                ['controller' => 'index', 'action' => 'stuff', 'roles' => ['user']],
// You can also specify an array of actions or an array of controllers (or both)
// allow "guest" and "admin" to access actions "list" and "manage" on these "index",
// "static" and "console" controllers
//                [
//                    'controller' => ['index', 'static', 'console'],
//                    'action' => ['list', 'manage'],
//                    'roles' => ['guest', 'admin'],
//                ],
//                [
//                    'controller' => ['search', 'administration'],
//                    'roles' => ['admin'],
//                ],
                ['controller' => 'zfcuser', 'roles' => []],
                array('controller' => 'Application\Controller\Index', 'action' => 'index', 'roles' => array('guest')),
                array('controller' => 'Application\Controller\Pc', 'action' => 'actual', 'roles' => array('guest')),
                array('controller' => 'Application\Controller\Pc', 'action' => 'history', 'roles' => array('guest')),
                array('controller' => 'Application\Controller\Pc', 'action' => 'general', 'roles' => array('guest')),
                array('controller' => 'Application\Controller\Pc', 'action' => 'location', 'roles' => array('guest')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'regconf', 'roles' => array('guest')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'index', 'roles' => array('guest')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'confirm', 'roles' => array('guest')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'stuff', 'roles' => array('admin')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'getAllUsers', 'roles' => array('admin')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'editUser', 'roles' => array('admin')),
                //array('controller' => 'MyModule\MyEntity\MyEntity', 'roles' => array('admin')),
// Below is the default index action used by the ZendSkeletonApplication
// ['controller' => 'Application\Controller\Index', 'roles' => ['guest', 'user']],
                array('controller' => 'Backend\Controller\Backend', 'action' => 'changeAvatar', 'roles' => array('user')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'upload', 'roles' => array('user')),
            //array('controller' => 'MyModule\MyEntity\MyEntity', 'roles' => array('admin')),
// Below is the default index action used by the ZendSkeletonApplication
// ['controller' => 'Application\Controller\Index', 'roles' => ['guest', 'user']],
            ],
        /* If this guard is specified here (i.e. it is enabled], it will block
         * access to all routes unless they are specified here.
         */
//            \BjyAuthorize\Guard\Route::class => [
//                ['route' => 'zfcuser', 'roles' => ['user']],
//                ['route' => 'zfcuser/logout', 'roles' => ['user']],
//                ['route' => 'zfcuser/login', 'roles' => ['guest']],
//                ['route' => 'zfcuser/register', 'roles' => ['guest']],
//                // Below is the default index action used by the ZendSkeletonApplication
//                ['route' => 'home', 'roles' => ['guest', 'user']],
//            ],
        ],
        'resource_providers' => [
            \BjyAuthorize\Provider\Resource\Config::class => [
                'user' => [],
            ],
        ],
        'rule_providers' => [
            \BjyAuthorize\Provider\Rule\Config::class => [
                'allow' => [
// allow guests and users (and admins, through inheritance)
// the "wear" privilege on the resource "pants"
//[['guest', 'user'], 'pants', 'wear'],
                    ['admin', 'user', 'administrateAll'],
                    ['user', 'user', 'administrateOwn'],
                ],
                // Don't mix allow/deny rules if you are using role inheritance.
// There are some weird bugs.
                'deny' => [
// ...
                ],
            ],
        ],
    ),
);
