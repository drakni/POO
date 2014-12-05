<?php

class Personnage{
	private $_force;
	private $_localisation;
	private $_experience;
	private $_degats;

	const FORCE_PETITE = 20;
  	const FORCE_MOYENNE = 50;
  	const FORCE_GRANDE = 80;

  	private static $_texteProvoc = "Tu vas prendre cher, pleutre !";

	//constructeur
	public function __construct($forceInitiale,$degats){
		$this->setForce($forceInitiale);
		$this->setDegats($degats);
		$this->setExperience(1);
	}

	//Getters
	public function force(){
		return $this->_force;
	}

	public function degats(){
		return $this->_degats;
	}

	public function experience(){
		return $this->_experience;
	}


	//Setters
	public function setForce($force){
		if (!in_array($force, array(self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE))) {
			trigger_error("La force doit &ecirc;tre &eacute;gale &agrave; ".self::FORCE_PETITE.", ".self::FORCE_MOYENNE." ou ".self::FORCE_GRANDE);
		}

		if(!is_int($force)){
			trigger_error("La force d'un personnage est obligatoirement un nombre entier.", E_USER_WARING);
			return;
		}
		if ($force>=100) {
			trigger_error("La force d'un personnage est obligatoirement inf&eacute;rieur &agrave; 100.", E_USER_WARING);
			return;
		}
		$this->_force = $force;
	}

	public function setDegats($degats){
		if(!is_int($degats)){
			trigger_error("Les degats d'un personnage est obligatoirement un nombre entier.", E_USER_WARING);
			return;
		}
		if ($degats>=100) {
			trigger_error("Les degats d'un personnage est obligatoirement inf&eacute;rieur &agrave; 100.", E_USER_WARING);
			return;
		}
		$this->_degats = $degats;
	}

	public function setExperience($experience){
		if(!is_int($experience)){
			trigger_error("L'exp&eacute;rience doit &ecirc;tre un nombre entier", E_USER_WARING);
			return;
		}
		$this->_experience = $experience;
	}


	//Autres méthodes
	public function parler() 
	{
		echo "Je suis un personnage !";		
	}

	public function afficherExperience(){
		echo "<p>Votre personnage a cumul&eacute; ". $this->_experience ."point(s) d'exp&eacute;rience jusqu'&agrave; pr&eacute;sent.</p>";
	}

	public function gagnerExperience(){
		$this->_experience += 1;
	}

	public function frapper(Personnage $persoCible){
		$persoCible->_degats += $this->_force;
		echo "Vous frappez de ". $this->_force ." points de d&eacute;gats. Votre adversaire accumule d&eacute;sormais ". $persoCible->_degats ." points de d&eacute;gats !";		
	}

	public static function provoquer(){
		echo self::$_texteProvoc;
	}
}

?>