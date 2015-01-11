<?php
$entityManager;
class userView{

     public function __construct($em) {
        global $entityManager;
        $entityManager = $em;

    }
    
    public function display() {

        echo <<<FORM
            
        <img src="getAvatar.php?id=1" width="175" height="200" />
        
FORM;
    }
    
   
   

}



