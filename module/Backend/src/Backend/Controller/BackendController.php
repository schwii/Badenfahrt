<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * 
 * Controller für die View Files unter Backend / Backend
 */

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Backend\Entity\User;
use Doctrine\ORM\EntityManager;

class BackendController extends AbstractActionController {

    // Funktion für die indexAction
    public function indexAction() {

        return new ViewModel(array(
            'em' => $this->getEntityManager(),
        ));
    }

    // Funktion für die editUserAction
    public function editUserAction() {
        return new ViewModel(array(
            'em' => $this->getEntityManager(),
        ));
    }

    // Funktion für die changeAction
    public function changeAvatarAction() {
        return new ViewModel(array(
            'em' => $this->getEntityManager(),
        ));
    }

    // Funktion für die getEntityAction
    private function getEntityManager() {
        $entityManager = $this->getServiceLocator()
                ->get('doctrine.entitymanager.orm_default');
        return $entityManager;
    }

    // Funktion für die confirmAction
    public function confirmAction() {
        return new ViewModel(array(
            'em' => $this->getEntityManager(),
        ));
    }
    
    public function deactivateUserAction() {
        return new ViewModel(array(
            'em' => $this->getEntityManager(),
        ));
    }

}
