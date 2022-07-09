<?php
	include 'CIUIL.php';
    require_once 'functions.php';

	$connessione = new DBConn("UData");
	$query = "	DELETE FROM Indirizzo_Spedizione WHERE IDShipment = ?";
	$connessione->doQP($query,$_POST['ID']);
	extRT("Indirizzo di spedizione eliminato con successo!", "myaccount.php", 5000);

?>

