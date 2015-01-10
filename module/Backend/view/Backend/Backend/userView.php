<?php
$entityManager;
class userView{

     public function __construct($em) {
        global $entityManager;
        $entityManager = $em;

    }
    
    public function display() {
        echo <<<FORM
        
        
        <p>USER</p>
        
FORM;
    }

}