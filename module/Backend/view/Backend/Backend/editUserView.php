<?php

class editUserView {

    protected $admin;
    
    public function editUser($entityManager, $userID) {

        $user = $entityManager->find('Backend\Entity\User', $userID);
        $email = $user->getEmail();
        $contactLast = $user->getContactLast();
        $contactSur = $user->getContactSur();



//    $user = $entityManager->find('Backend\Entity\User', $userID);
        $orgname = $user->getOrgname();
        $street = $user->getStreet();
        $streetNr = $user->getStreetNr();
        $zip = $user->getZip();
        $city = $user->getCity();
        $image = $user->getLogo();
        $sex = $user->getContactSex();
        $phone = $user->getPhone();
        //$password = $user->getPassword();


        
        if($this->admin){
            $passwordInput =  '        <div class="form-group">
            <label class="col-lg-3 control-label">Passwort:</label>
            <div class="col-lg-8">
              <input name="password" class="form-control" type="text">
            </div>
          </div>';
        }
        else{
            $passwordInput = "";
        }
        
        
        echo <<<FORM
<div class="container">
    <h1>Profil bearbeiten</h1>
  	<hr>
	<div class="row">
      
         <form class="form-horizontal" role="form"method="post">
            <input name="userID" class="form-control" type="hidden" value=$userID >
          <div class="form-group">
            <label class="col-lg-3 control-label">Vorname:</label>
            <div class="col-lg-8">
              <input name="contactSur" class="form-control" type="text" required value=$contactSur >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nachname:</label>
            <div class="col-lg-8">
              <input name="contactLast" class="form-control" type="text" required value=$contactLast>
            </div>
          </div>
         
   
         <div class="form-group">
            <label class="col-lg-3 control-label">Geschlecht:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="gender" id="gender" class="form-control">
                  <option {$sex}>Männlich</option>
                  <option {$sex}>Weiblich</option>
                  <option {$sex}>Firma</option>
                </select>
              </div>
            </div>
          </div>
   
          <div class="form-group">
            <label class="col-lg-3 control-label">Firma, Organisation:</label>
            <div class="col-lg-8">
              <input name="orgname" class="form-control" type="text" value=$orgname>
            </div>
          </div>
              
          <div class="form-group">
            <label class="col-lg-3 control-label">Strasse:</label>
            <div class="col-lg-8">
              <input name="street" class="form-control" type="text" required value=$street >
            </div>
          </div>  
              
          <div class="form-group">
            <label class="col-lg-3 control-label">Nr:</label>
            <div class="col-lg-8">
              <input name="streetNr" class="form-control" type="text" required value=$streetNr >
            </div>
          </div>
              
          <div class="form-group">
            <label class="col-lg-3 control-label">Postleitzahl:</label>
            <div class="col-lg-8">
              <input name="zip" class="form-control" type="text" required value=$zip >
            </div>
          </div>    
              
              <div class="form-group">
            <label class="col-lg-3 control-label">Ort:</label>
            <div class="col-lg-8">
              <input name="city" class="form-control" type="text" required value=$city >
            </div>
          </div>
              
             <div class="form-group">
            <label class="col-lg-3 control-label">Telefon:</label>
            <div class="col-lg-8">
              <input name="phone" class="form-control" type="text" required value=$phone >
            </div>
          </div>   
         
            $passwordInput
            
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button name="changeUser" value="UsErChAnGe" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Ändern</button>
              <span></span>
               <button name="cancel" value="cancel" type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> Abbrechen</button>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
 
FORM;
    }
    public function setAdmin(){
        $this->admin = true;
    }

//include_once('vendor\zendframework\zendframework\library\Zend\Crypt\Password\bcrypt.php'); 
//$bcrypt = new Zend\Crypt\Password\Bcrypt();
//$bcrypt->setCost(14);
//echo $bcrypt->create($password);
}
