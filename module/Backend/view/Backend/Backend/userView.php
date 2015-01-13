<?php
$entityManager;

class userView{
private $user;
     public function __construct($em, $usr) {
        global $entityManager;
       //global $user;
        $entityManager = $em;
        $this->user = $usr;
    }
    
    public function display() {
//<img src="getAvatar.php?id=1" width="175" height="200" />
        //global $user;
        $orgname = $this->user->getOrgname();
        $surname = $this->user->getContactSur();
        $lastname = $this->user->getContactLast();
        $street = $this->user->getStreet();
        $streetNr = $this->user->getStreetNr();
        $zip = $this->user->getZip();
        $city = $this->user->getCity();  
        

echo "<div class='panel panel-default'>";
echo  "<div class='panel-heading'>";
echo   "<h3 class='panel-title'>Persönliche Informationen</h3>";
echo  "</div>";
echo  "<div class='panel-body'> "  ;         
echo  "<p>$orgname</p>";
echo  "<p>$surname $lastname</p>";
echo  "<p>$street $streetNr</p>";
echo  "<p>$zip $city</p>";


echo " </div>";
echo"</div>";

    }
    
   
   

}



