<?php

namespace Backend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Backend\Entity\User;
use Doctrine\ORM\EntityManager;

//use Zend\Acl\Assertion\AssertionInterface;


class BackendController extends AbstractActionController {

    public function indexAction() {

        return new ViewModel(array(
            'em' => $this->getEntityManager(),
        ));
    }

    public function editUserAction() {
        return new ViewModel(array(
            'em' => $this->getEntityManager(),
        ));
    }

    public function changeAvatarAction() {
        return new ViewModel(array(
            'em' => $this->getEntityManager(),
        ));
    }

    private function getEntityManager() {
        $entityManager = $this->getServiceLocator()
                ->get('doctrine.entitymanager.orm_default');
        return $entityManager;
    }

    public function regconfAction() {
        return new ViewModel();
    }
    
    public function confirmAction(){
         return new ViewModel(array(
            'em' => $this->getEntityManager(),
        ));
    }

    
}
