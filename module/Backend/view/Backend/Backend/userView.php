<?php
$entityManager;

class userView{
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
        $image = $this->user->getLogo();
        $email = $this->user->getEmail();
        $phone = $this->user->getPhone();
        //$timecreate = $this->user->getTimeCreate()->format("d-m-Y H:i:s");
       //$timecreate = date("d-m-Y H:i:s", strtotime($this->user->getTimeCreate()));
       $timecreate = 'hüt';


echo <<<FORM
       <form class="form-horizontal" method="post">
 <div class="containert">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">    
   <br>
<p class=" text-info">Benutzer seit:$timecreate</p>
      </div>
        <div class="col-xs-10 col-sm-10 col-md-8 col-lg-10 col-xs-offset-6 col-sm-offset-6 col-md-offset-0 col-lg-offset-0 toppad">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><p>$surname $lastname</p></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-4 col-lg-4 " align="center"> <img alt="Hier k�nnte ihr Logo zu sehen sein" src= $image class="img"> </div>
                <div class=" col-md-8 col-lg-8 "> 
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
                 <div class="panel-footer">
                            <p>Ändern: </p>
                            <button class='btn-xs btn-info' type='submit' value='1' name='editUser'>Personalien <i class="glyphicon glyphicon-edit"></i></button>
                            <button class='btn-xs btn-info' type='submit' value='2' name='editUser'>E-Mail <i class="glyphicon glyphicon-envelope"></i></button>
                            <button class='btn-xs btn-info' type='submit' value='3' name='editUser'>Passwort <i class="glyphicon glyphicon-wrench"></i></button>                  
   </div>
   </span>
                    </div>
        </form>
   
 
FORM;


    }
}

