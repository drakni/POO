<?php

	function chargerClasse($classe){
		require ("/model/".$classe."/".$classe.".php");
	}

	//enregistrement auto des classes appelées dans la view
	spl_autoload_register('chargerClasse');

?>