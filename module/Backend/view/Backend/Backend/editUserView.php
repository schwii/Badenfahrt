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
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          <strong>Achtung,</strong> hier könnte ihre Werbung stehen!
        </div>
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Vorname:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" required value=$contactSur >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nachname:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" required value=$contactLast>
            </div>
          </div>
         
   
         <div class="form-group">
            <label class="col-lg-3 control-label">Geschlecht:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select id="gender" class="form-control">
                  <option {$sex}>Männlich</option>
                  <option {$sex}>Weiblich</option>
                  <option {$sex}>Keine Angabe</option>
                </select>
              </div>
            </div>
          </div>
   
          <div class="form-group">
            <label class="col-lg-3 control-label">Firma, Organisation:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" required value=$orgname>
            </div>
          </div>
              
          <div class="form-group">
            <label class="col-lg-3 control-label">Strasse:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" required value=$street >
            </div>
          </div>  
              
          <div class="form-group">
            <label class="col-lg-3 control-label">Nr:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" required value=$streetNr >
            </div>
          </div>
              
          <div class="form-group">
            <label class="col-lg-3 control-label">Postleitzahl:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" required value=$zip >
            </div>
          </div>    
              
              <div class="form-group">
            <label class="col-lg-3 control-label">Ort:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" required value=$city >
            </div>
          </div>
              
             <div class="form-group">
            <label class="col-lg-3 control-label">Telefon:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" required value={$this->vars['Phone']} >
            </div>
          </div>   
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" required value=$email>
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-md-3 control-label">Passwort:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" required value=$password>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Passwort bestätigen:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" required value=$password>
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

public function change(){
    
    //Abfragen auf Änderung etc?
    
    global $entityManager;
    $user = $entityManager->find('Backend\Entity\User', $this->vars['userID']);
    $user->setContactLast($_POST['lastname']);
    $user->setContactSur($_POST['surname']);
    $user->setOrgname($_POST['orgname']);
    $user->setEmail($_POST['email']);
    $user->setStreet($_POST['street']);
    $user->setStreetNr($_POST['streetNr']);
    $user->setZip($_POST['zip']);
    $user->setCity($_POST['city']);
    $user->setPhone($_POST['phone']);
    $user->setTimeCreate($_POST['timecreate']);
    $user->setLogo($_POST['logo']);
    $user->setPassword($_POST['password']);
    
    if(!$_POST['password']=="" && $_POST['password']==$_POST['passwordrepeat']){
        $user->setPassword($_POST['password']);
    }
    else{
        "echo pw falsch -> bei phtml abfragen und alte werte übergeben";
    }    
    
    $entityManager->flush();
    
    //echo $_POST['email'];
}

public function assign($key, $value) {
        $this->vars[$key] = $value;
    }
    
}


//include_once('vendor\zendframework\zendframework\library\Zend\Crypt\Password\bcrypt.php'); 
//$bcrypt = new Zend\Crypt\Password\Bcrypt();
//$bcrypt->setCost(14);
//echo $bcrypt->create($password);






