<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Backend;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);


        $services = $e->getApplication()->getServiceManager();
        $zfcServiceEvents = $services->get('zfcuser_user_service')->getEventManager();
        $zfcServiceEvents->attach('register', function($e) use ($services) {
            $user = $e->getParam('user');
            $em = $services->get('Doctrine\ORM\EntityManager');
            $defaultUserRole = $em->getRepository('Backend\Entity\Role')
                    ->findOneBy(array('roleId' => 'user'));
            $user->addRole($defaultUserRole);
            $user->setState(3);  //3=noch nicht double-opt-in
            $user->setDisplayName($user->getContactSur());
            $user->setTimeCreate(new \DateTime());
            $user->setDoubleoptin(20); //double-opt-in setzen -> (x) Anzahl Stellen
            $user->sendConfirmationMail();
        });
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}
