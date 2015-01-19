<?php

class editUserView{

public function editUser($entityManager, $userID){
    
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
        $password = $user->getPassword();
    
        
    echo <<<FORM
<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="$image" class="avatar img" alt="avatar">
          <h6>Anderes Foto hochladen</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">�</a> 
          <i class="fa fa-coffee"></i>
          <strong>Achtung,</strong> hier könnte ihre Werbung stehen!
        </div>
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
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
              <input name="orgname" class="form-control" type="text" required value=$orgname>
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
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button name="changeUser" value="UsErChAnGe" type="submit" class="btn btn-primary btn-lg">Ändern</button>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
 
FORM;
}


//include_once('vendor\zendframework\zendframework\library\Zend\Crypt\Password\bcrypt.php'); 
//$bcrypt = new Zend\Crypt\Password\Bcrypt();
//$bcrypt->setCost(14);
//echo $bcrypt->create($password);





}
