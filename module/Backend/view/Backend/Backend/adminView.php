<?php
$entityManager;

class adminView{
    
    public function __construct($em) {
        global $entityManager;
        $entityManager = $em;

    }
    

    public function display() {
        $users = $this->getAllUsersAction();   //Alle User 
        echo '<img src="getAvatar.php?id=1" width="175" height="200" />';
     // echo '<div class="row">';
       // echo '<div class="col-md-10">';
            echo '<div class="panel panel-default">';  
                echo '<div class="panel-heading">';
                        echo '<h3 class="panel-title">User Übersicht</h3>';
                        echo '</div>';
                        echo '<div class="panel-body">';
                            echo '<table class="table">';
                                echo '<tr>';
                                    echo '<th>E-Mail</th>';
                                    echo '<th>Vorname</th>';
                                    echo '<th>Nachname</th>';
                                    echo '<th>Editieren</th>';
                                    echo '<th>Status</th>';
                                    foreach ($users as $user) {
                                        $email = $user->getEmail();
                                        $surname = $user->getContactSur();
                                        $lastname = $user->getContactLast();
                                        $userid = $user->getId();
                                        $state =$user->getState();
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
                                                     $statetxt ="bö";
                                            }
                                        echo '</tr>';
                                            echo "<td>$email</td>";
                                            echo "<td>$surname</td>";
                                            echo "<td>$lastname</td>";
                                            echo "<td><a href='editUser?user=$userid'>Edit</a></td>";
                                            echo "<td>$statetxt</td>";
                                            if($state==1){
                                                echo "<td><a href='deactivateUser?user=$userid'>Deaktivieren</a></td>";
                                            }
                                            else{
                                                echo "<td><a href='activateUser?user=$userid'>Aktivieren</a></td>";
                                            }
                                            

                                        echo '</tr>';
                                    }
                            echo '</table>';
                        echo '</div>'; 
                echo '</div>'; 
            echo '</div>';  
       // echo '</div>';  
     // echo '</div>'; 
            
    }
    
    
    
    private function getAllUsersAction(){ 
        global $entityManager;
        $userRepository = $entityManager->getRepository('Backend\Entity\User');
        $users = $userRepository->findAll();
        //$users = $userRepository->findBy(array('state' => '9'));
        return $users;
}
    
    
}
