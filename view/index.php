<?php

//Lancement du controler de chargement auto des classes
require("/controler/classLoader.php");

$perso1 = new Personnage(Personnage::FORCE_GRANDE,0);
$perso2 = new Personnage(Personnage::FORCE_PETITE,0);

Personnage::provoquer();
$perso1->frapper($perso2);
$perso1->setExperience(10);

$perso2->frapper($perso1);
$perso2->setExperience(5);

echo "<p>Le personnage 1, qui a ".$perso1->force()." points de force, cumule ".$perso1->experience()." points d'exp&eacute;rience et un total de ".$perso1->degats()." d&eacute;gats culum&eacute;s.</p>";
echo "<p>Le personnage 2, qui a ".$perso2->force()." points de force, cumule ".$perso2->experience()." points d'exp&eacute;rience et un total de ".$perso2->degats()." d&eacute;gats culum&eacute;s.</p>";

?>