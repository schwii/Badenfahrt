<?php

header("Content-type: image/jpeg");
global $entityManager;
$user = $entityManager->find('Backend\Entity\User', 1); //user 1! zum testen
$file = $user->getLogo();

header("Content-type: image/jpeg");
echo $file;
return base64_encode($file);

