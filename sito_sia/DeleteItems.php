<?php
		include 'checkifadmin.php';
		require_once 'functions.php';

		if(empty($_POST['todelete']))
			extB("Nessun elemento selezionato.");

		$connessione = new DBConn("UData");
		
		foreach($_POST['todelete'] as $var)	
		{
			$query = "SELECT IMG FROM Articles WHERE ID = ?";
			$connessione->doQP($query, $var);
			$connessione->fetch();
			unlink($connessione->get("IMG"));
		}
		
		$query = "DELETE FROM Articles WHERE ID IN (";
		$params = array();

		foreach ($_POST['todelete'] as $var)
		{
			$query .= " ? ,";
			array_push($params, $var);
		}
		$query = rtrim($query, ","); 
		$query.= ")";
		
		$connessione->doQP($query, $params);
		
		$connessione->close();
		extBT("Elemento/i eliminato/i correttamente", 1500);
 ?>
