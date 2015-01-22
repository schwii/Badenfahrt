<?php

$entityManager;

class adminView {
    protected $notification;


    public function __construct($em) {
        global $entityManager;
        $entityManager = $em;

        if (!empty($_POST['deactivateUser'])) {
            $user = $em->find('Backend\Entity\User', $_POST['deactivateUser']);
            $user->setState(9);
            $em->flush();
        }
        if (!empty($_POST['activateUser'])) {
            $user = $em->find('Backend\Entity\User', $_POST['activateUser']);
            $user->setState(1);
            $em->flush();
        }
        if (!empty($_POST['confirmUser'])) {
            $user = $em->find('Backend\Entity\User', $_POST['confirmUser']);
            $user->setDoubleoptin(20); //neuen Key generieren
            $em->flush();
            if($user->sendConfirmationMail()==1){
            $this->notification = "Mail erfolgreich versendet.";    
            }
            
            //echo "Bestätigungs Mail an"& $user->getEmail() &"versendet";  //müesst no überprüefe ob okay etc.
        }
    }

    public function display() {
        //echo $_POST['deactivate'];
        $users = $this->getAllUsersAction();   //Alle User
        // echo '</div>';  
        // echo '</div>'; 
        // echo '<div class="row">';
        // echo '<div class="col-md-10">';
        echo '<form class="form-horizontal" method="post">';
        echo '<div class="panel panel-default">';
        echo '<div class="panel-heading">';
        $usercount = count($users);
        echo "<h3 class='panel-title'>User Übersicht - Anzahl: $usercount</h3>";
        echo '</div>';
        echo '<div class="panel-body">';
        echo '<table class="table">';
        echo '<tr>';
        echo '<th>E-Mail</th>';
        echo '<th>Vorname</th>';
        echo '<th>Nachname</th>';
        echo '<th>Status</th>';
        echo '<th></th>';
        echo '<th></th>';
        foreach ($users as $user) {
            $email = $user->getEmail();
            $surname = $user->getContactSur();
            $lastname = $user->getContactLast();
            $userid = $user->getId();
            $state = $user->getState();
            switch ($state) {
                case 1:
                    $statetxt = "Aktiv";
                    break;
                case 3:
                    $statetxt = "Noch nicht bestätigt";
                    break;
                case 9:
                    $statetxt = "Deaktiviert";
                    break;
                default:
                    $statetxt = "bö";
            }
            echo '</tr>';
            echo "<td>$email</td>";
            echo "<td>$surname</td>";
            echo "<td>$lastname</td>";
            //echo "<td><a href='editUser?user=$userid'>Edit</a></td>";
            echo "<td>$statetxt</td>";
            echo "<td><button class='btn-xs btn-info' type='submit' name='editUser' value='$userid'><i class='glyphicon glyphicon-edit'></i> Editieren</button></td>";
            if ($state == 1) {
                echo "<td><button class='btn-xs btn-danger' type='submit' name='deactivateUser' value='$userid'><i class='glyphicon glyphicon-remove'></i> Deaktivieren</button></td>";
            } else {
                echo "<td><button class='btn-xs btn-success' type='submit' name='activateUser' value='$userid'><i class='glyphicon glyphicon-ok'></i> Aktivieren</button></td>";
                echo "<td><button class='btn-xs btn-warning' type='submit' name='confirmUser' value='$userid'><i class='glyphicon glyphicon-envelope'></i> Bestätigungs Mail senden</button></td>";
            }
            

            echo '</tr>';
        }
        echo '</table>';
        if(!empty($this->notification)){
                echo "<div class='alert alert-success' role='alert'>$this->notification</div>";    
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</form>';

        // echo '</div>';  
        // echo '</div>'; 
    }

    private function getAllUsersAction() {
        global $entityManager;
        $userRepository = $entityManager->getRepository('Backend\Entity\User');
        $users = $userRepository->findAll();
        //$users = $userRepository->findBy(array('state' => '9'));
        return $users;
    }

}
