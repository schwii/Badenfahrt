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

        $sel1 = "";
        $sel2 = "";
        $sel3 = "";

        //Anhand Zahl die Option zur Geschlechtswahl selektieren
        //vermutlich nicht gerade die eleganteste Art :/
        //1=Männlich 2=Weiblich 3=Firma
        //Für Korrespondenz!
        switch ($sex) {
            case 1:
                $sel1 = "selected";
                break;

            case 2:
                $sel2 = "selected";
                break;

            case 3:
                $sel3 = "selected";
                break;
        }
        if ($this->admin) {
            $passwordInput = '        <div class="form-group">
            <label class="col-lg-3 control-label">Passwort:</label>
            <div class="col-lg-8">
              <input name="password" class="form-control" type="text">
            </div>
          </div>';
        } else {
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
                <select name="sex" id="sex" class="form-control">
                  <option value="1" {$sel1}>Männlich</option>
                  <option value="2" {$sel2}>Weiblich</option>
                  <option value="3" {$sel3}>Firma</option>
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
              <input name="streetNr" class="form-control" type="text" required value='$streetNr' >
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
              <input name="phone" class="form-control" type="text" required value='$phone' >
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

    public function setAdmin() {
        $this->admin = true;
    }

}
