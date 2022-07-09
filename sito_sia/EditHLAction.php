<?php
		include 'checkifadmin.php';
		require_once 'functions.php';

		if(empty($_POST['toHL']))
			extB("Nessun elemento selezionato.");

		$connessione = new DBConn("UData");
		$connessione->doQ("UPDATE Articles SET HL = 0");
		foreach($_POST['toHL'] as $var)	
		{
			$query = "UPDATE Articles SET HL = 1 WHERE ID = ?";
			$connessione->doQP($query, $var);
		}
		
		$connessione->close();
		extBT("Prodotti in evidenza aggiornati correttamente.", 1500);
 ?>
