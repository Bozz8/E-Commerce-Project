<?php
	require_once 'checkifadmin.php';
	require_once 'functions.php';
	checkAllSet();

    $query = "UPDATE Articles SET PN = ?, Manufacturer = ?, Seller = ?, Availability = ?, N_Left = ?, Description = ?, Price = ?, Category = ? WHERE ID = ?";
    $params = array($_POST['PN'], $_POST['Manufacturer'], $_POST['Seller'], $_POST['Availability'], $_POST['N_Left'], $_POST['Description'], $_POST['Price'], $_POST['Category'], $_POST['PID']);

    $connessione = new DBConn("UData");
		$connessione->doQP($query, $params);
    extR("Articolo modificato correttamente", "editItemsPanel.php");

?>
