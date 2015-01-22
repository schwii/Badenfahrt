<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * 
 * Controller für die View Files unter pc 
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PcController extends AbstractActionController {

    // Funktion für die historyAction
    public function historyAction() {
        return new ViewModel();
    }

    // Funktion für die locationAction
    public function locationAction() {
        return new ViewModel();
    }

    // Funktion für die actualAction
    public function actualAction() {
        return new ViewModel();
    }

    // Funktion für die generalAction
    public function generalAction() {
        return new ViewModel();
    }

}
