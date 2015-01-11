<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PcController extends AbstractActionController {

    public function infoAction() {
        return new ViewModel();
    }

    public function historyAction() {
        return new ViewModel();
    }

    public function locationAction() {
        return new ViewModel();
    }

    public function actualAction() {
        return new ViewModel();
    }

    public function generalAction() {
        return new ViewModel();
    }
    public function loginAction() {
        include_once '../../../view/zfc-user/user/login.phtml';
    }
        public function registerAction() {
        include_once '../../../view/zfc-user/user/register.phtml';
    }

}
