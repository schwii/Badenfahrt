<?php
$entityManager;
class editUserView_old{
protected $vars = array(); 


public function __construct($em) {
    global $entityManager;
    $entityManager = $em;
}

public function display(){

echo <<<FORM
 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Titelblabla</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                          
                                <input id="email" name="email" type="email" required value={$this->vars['Email']} class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lastname" name="lastname" type="text" required value={$this->vars['ContactLast']} class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="surname" name="surname" type="text" required value={$this->vars['ContactSur']} class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="password" name="password" type="password" placeholder="Neues Passwort" class="form-control">
                            </div>
                        </div>  
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="passwordrepeat" name="passwordrepeat" type="password" placeholder="Neues Passwort wiederholen" class="form-control">
                            </div>
                        </div>  
                                
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Ändern</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>   
   
 
FORM;
}  


public function change(){
    
    //Abfragen auf Änderung etc?
    
    global $entityManager;
    $user = $entityManager->find('Backend\Entity\User', $this->vars['userID']);
    $user->setContactLast($_POST['lastname']);
    $user->setContactSur($_POST['surname']);
    $user->setEmail($_POST['email']);
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
