<?php
	session_start();
	include 'functions.php';

	checkAllSet();

	$connessione = new DBConn("UData");

	$username = strtolower($_POST["adminuser"]);
	$pass = $_POST["apassword"];

	$query = "SELECT * FROM AdminData WHERE lower(AdminUsername) = ?;";
	$connessione->doQP($query, $username);
	if(!$connessione->getNumRows()) // se la query non ha trovato risultati...
		extB("Username non registrato");

	$riga = $connessione->fetch();
	$dbpwd = $connessione->get("AdminPassword");

	if(strcmp($pass, $dbpwd)) // se la password non corrisponde...
		extB("Password errata");

	if(isset($_SESSION["loginStatus"]) && !strcmp($_SESSION["loginStatus"], "logged_as_admin"))
		extB("Non devi essere loggato come utente per poter loggare come admin");

	if(!isset($_SESSION["loginStatus"]))
	{
		$_SESSION["cognome"] = $connessione->get("AdminUsername");
		$_SESSION["nome"] = "Admin";
		$_SESSION["loginStatus"] = "logged_as_admin";
		$_SESSION["AUID"] = $connessione->get('ID');
	}
	$connessione->close();
	extR("Login effettuato con successo <br/> <a href='adminpanel.php'> Clicca qua per andare al pannello </a> oppure attendi per essere reindirizzato", "adminpanel.php");
?>
