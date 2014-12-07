<?php

//Lancement du controler de chargement auto des classes
require("/controler/classLoader.php");


$perso1 = new Personnage(array(
  'nom' => 'Victor',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
));

$perso2 = new Personnage(array(
  'nom' => 'Robert',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
));
    
/*$perso1->encaisser();
$perso1->frapper($perso2);*/

try
{
	$db = new PDO('mysql:host=localhost;dbname=tests', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$manager = new PersonnagesManager($db);

$manager->count();
$manager->exists(1);

?>