<?php

/**
 * Globlaes Konfigurationsfiles für bjauthorize
 */

return array(
    'doctrine' => array(
        'driver' => array(
// overriding zfc-user-doctrine-orm's config
            'zfcuser_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => './module/Backend/src/Backend/Entity'
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Backend' => 'zfcuser_entity',
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
                // Hier wird definiert, auf welche Seite welche Benutzerrolle zugreifen darf
                ['controller' => 'zfcuser', 'roles' => []],
                array('controller' => 'Application\Controller\Index', 'action' => 'index', 'roles' => array('guest')),
                array('controller' => 'Application\Controller\Pc', 'action' => 'actual', 'roles' => array('guest')),
                array('controller' => 'Application\Controller\Pc', 'action' => 'history', 'roles' => array('guest')),
                array('controller' => 'Application\Controller\Pc', 'action' => 'general', 'roles' => array('guest')),
                array('controller' => 'Application\Controller\Pc', 'action' => 'location', 'roles' => array('guest')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'index', 'roles' => array('guest')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'confirm', 'roles' => array('guest')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'stuff', 'roles' => array('admin')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'getAllUsers', 'roles' => array('admin')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'editUser', 'roles' => array('admin')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'changeAvatar', 'roles' => array('user')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'upload', 'roles' => array('user')),
                array('controller' => 'Backend\Controller\Backend', 'action' => 'deactivateUser', 'roles' => array('user')),
            ],
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
                    ['admin', 'user', 'administrateAll'],
                    ['user', 'user', 'administrateOwn'],
                ],
// Don't mix allow/deny rules if you are using role inheritance.
// There are some weird bugs.
                'deny' => [
                ],
            ],
        ],
    ),
);
