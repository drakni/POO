<?php

//Lancement du controler de chargement auto des classes
require("/controler/classLoader.php");


$perso = new Personnage(array(
  'nom' => 'Victor',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
));
    
$db = new PDO('mysql:host=localhost;dbname=tests', 'root', '');
$manager = new PersonnagesManager($db);

    
$manager->add($perso);

?>