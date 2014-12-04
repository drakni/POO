<?php

include_once("model/personnage/personnage.php");

$perso1 = new Personnage();
$perso2 = new Personnage();

$perso1->frapper($perso2);
$perso1->gagnerExperience();

$perso2->frapper($perso1);
$perso2->gagnerExperience();

?>