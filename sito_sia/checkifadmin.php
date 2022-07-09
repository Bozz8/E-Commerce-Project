<?php
	session_start();
	require_once 'functions.php';

	if(!isset($_SESSION["loginStatus"]))
		extR("Devi aver effettuato l'accesso come Amministratore per accedere a questa sezione.", "index.php");

	if(strcmp($_SESSION["loginStatus"], "logged_as_admin"))
		extR("Area riservata.", "index.php");
?>
