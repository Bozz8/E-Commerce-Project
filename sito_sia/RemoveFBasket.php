<?php
	session_start();
	include 'functions.php';


	if(empty($_POST['basketRemove']))
		extR("Nessun articolo selezionato", "Basket.php");

	$connessione = new DBConn("UData");
	$connessione->checkErr();

	$params = array();

	$query = "DELETE FROM Basket
				WHERE AID IN (";
	foreach ($_POST['basketRemove'] as $var)
	{
		$query .= "? ,";
		array_push($params, $var);
	}
	$query = rtrim($query, ",");
	$query.= ")";

	$query .= " AND UID = ?";
	array_push($params, $_SESSION['UID']);

	$connessione->doQP($query, $params);
	extR("Articolo/i elimitato dal carrello", "Basket.php");
?>
