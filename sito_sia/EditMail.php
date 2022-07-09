<?php
	include 'CIUIL.php';
	checkAllSet();
	$connessione = new DBConn("UData");
	$query = "SELECT Password,SALT FROM RegisterData WHERE ID = ?";
	$connessione->doQP($query,$_SESSION['UID']);
	$connessione->fetch();

	$PasswordDatabase = $connessione->get("Password");
	$HashedPassword = myHash($_POST['CurrPass'], $connessione->get("SALT"));
	
	if(strcmp($HashedPassword, $PasswordDatabase))
		extB("Password attuale non corrisponde; riprovare");

	if(strcmp($_POST['NewMail'],$_POST['ConfNewMail']))
		extB("La mail inserita non corrisponde");

	$query = "UPDATE RegisterData SET Email = ? WHERE ID = ?";
	$connessione->doQP($query,array($_POST['NewMail'], $_SESSION['UID']));
	
	session_destroy();
	extR("Email modificata con successo", "Login_Form.php");
	
?>