<?php

$entityManager;

class userView {

    private $user;

    public function __construct($em, $usr) {
        global $entityManager;


        $entityManager = $em;
        $this->user = $usr;
    }

    public function display() {

        $orgname = $this->user->getOrgname();
        $surname = $this->user->getContactSur();
        $lastname = $this->user->getContactLast();
        $street = $this->user->getStreet();
        $streetNr = $this->user->getStreetNr();
        $zip = $this->user->getZip();
        $city = $this->user->getCity();
        $logo = $this->user->getLogo();
        $logo = "../img/users/" . $logo;
        $email = $this->user->getEmail();
        $phone = $this->user->getPhone();
        $timecreate = $this->user->getTimeCreate()->format("d.m.Y H:i:s");
        //$timecreate = date("d-m-Y H:i:s", strtotime($this->user->getTimeCreate()));
//        $timecreate = 'hüt';


        echo <<<FORM
       <form class="form-horizontal" method="post">
 <div class="containert">
      <div class="row">
      <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7 col-xs-offset-0 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 toppad">    
   <br>
<p class=" text-info">Benutzer seit: $timecreate</p>
      </div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7 col-xs-offset-0 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 toppad">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><p>$surname $lastname</p></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive"> 
              <div class="row">
                <div class="col-xs-3 col-sm-3"  align="center"> <img width="450"  alt="Hier könnte ihr Logo zu sehen sein" src= $logo class="img-thumbnail" alt="Responsive image"> </div>
                <div class=" col-xs-9 col-sm-9 pull-right"> 
                    
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Firma,Organisation</td>
                        <td>$orgname</td>
                      </tr>
                       <tr>
                        <td>Strasse</td>
                        <td>$street $streetNr</td> 
                      </tr>
                       <tr>
                        <td>Ort</td>
                        <td>$zip $city</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>$email</a></td>
                      </tr>
                      <tr>
                        <td>Telefon</td>
                        <td>$phone</td>
                      </tr>               
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                            <strong><p>Ändern: </p></strong>
                            <button class='btn-xs btn-info' type='submit' value='C' name='editUser'>Profil <i class="glyphicon glyphicon-edit"></i></button>
                            <button class='btn-xs btn-info' type='submit' value='E' name='editUser'>E-Mail <i class="glyphicon glyphicon-envelope"></i></button>
                            <button class='btn-xs btn-info' type='submit' value='P' name='editUser'>Passwort <i class="glyphicon glyphicon-wrench"></i></button>    
                            <button class='btn-xs btn-info' type='submit' value='A' name='editUser'>Logo <i class="glyphicon glyphicon-picture"></i></button>
                            <button class='btn-xs btn-danger' type='submit' value='D' name='editUser'>Konto löschen <i class="glyphicon glyphicon-trash"></i></button>
   </div>
   </span>
                    </div>
        </form>
   
 
FORM;
    }

}
