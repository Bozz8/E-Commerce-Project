<?php
	include 'CIUIL.php';
	checkAllSet();
	$connessione = new DBConn("UData");
	$query = "SELECT Password, SALT FROM RegisterData WHERE ID = ?";
	$connessione->doQP($query,$_SESSION['UID']);
	$connessione->fetch();
	
	$PasswordDatabase = $connessione->get("Password");
	$HashedPassword = myHash($_POST['CurrPass'], $connessione->get("SALT"));
	
	if(strcmp($HashedPassword, $PasswordDatabase))
		extB("Password attuale non corrisponde; riprovare");

	if(strcmp($_POST['NewPass'],$_POST['ConfNewPass']))
		extB("Le password non corrispondono.");

	$query = "UPDATE RegisterData SET Password = ? , SALT = ? WHERE ID = ?";
	
	$newSalt = bin2hex(openssl_random_pseudo_bytes(128));
	$NewHashedPassword = myHash($_POST['NewPass'], $newSalt);
	$connessione->doQP($query, array($NewHashedPassword, $newSalt, $_SESSION['UID']));
	echo "Password modificata con successo";
	sleep(3);
	include 'Logout.php';
?>


	