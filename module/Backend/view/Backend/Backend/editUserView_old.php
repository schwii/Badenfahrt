<?php

class editUserView {

    public function editUser($entityManager, $userID) {

        $user = $entityManager->find('Backend\Entity\User', $userID);
        $email = $user->getEmail();
        $contactLast = $user->getContactLast();
        $contactSur = $user->getContactSur();
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
                          
                                <input id="email" name="email" type="email" required value=$email class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lastname" name="lastname" type="text" required value=$contactLast class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="surname" name="surname" type="text" required value=$contactSur class="form-control">
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
                                <button name="changeUser" value="UsErChAnGe" type="submit" class="btn btn-primary btn-lg">Ändern</button>
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

//include_once('vendor\zendframework\zendframework\library\Zend\Crypt\Password\bcrypt.php'); 
//$bcrypt = new Zend\Crypt\Password\Bcrypt();
//$bcrypt->setCost(14);
//echo $bcrypt->create($password);
}
