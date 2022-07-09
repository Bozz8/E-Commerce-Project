<?php
	include 'CIUIL.php';
    require_once 'functions.php';

	$connessione = new DBConn("UData");
	$query = "	DELETE FROM Indirizzo_Fatturazione WHERE IDBilling = ?";
	$connessione->doQP($query,$_POST['ID']);
	extRT("Indirizzo di fatturazione eliminato con successo!", "myaccount.php", 5000);

?>