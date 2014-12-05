<?php

class Personnage{
	private $_force;
	private $_localisation;
	private $_experience;
	private $_degats;

	//constructeur
	public function __construct($force,$degats){
		$this->setForce($force);
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
}

?>