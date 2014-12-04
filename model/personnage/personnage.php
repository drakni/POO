<?php

class Personnage{
	private $_force = 20;
	private $_localisation;
	private $_experience = 0;
	private $_degats = 0;

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

		$this->_force = $force;
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
		echo "Votre personnage a gagn&eacute; ". $this->_experience ."point(s) d'exp&eacute;rience !";
	}

	public function frapper(Personnage $persoCible){
		$persoCible->_degats += $this->_force;
		echo "Vous frappez de ". $this->_force ." points de d&eacute;gats. Votre adversaire accumule d&eacute;sormais ". $persoCible->_degats ." points de d&eacute;gats !";		
	}
}

?>