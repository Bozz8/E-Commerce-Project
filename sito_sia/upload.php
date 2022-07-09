<?php
	include 'checkifadmin.php';
	checkAllSet();
	define("MAX_IMG_SIZE", 4000000); // Dimensioni in bytes

	$connessione = new DBConn("UData"); // parametri di connessione al database. [locazione, username, password, nome del database].

	if (empty($_POST['n_pezzi']))
		$_POST['disponibilita'] = 0;

	if($_POST['disponibilita'] != 1) // Se la disponibilità non è "disponibile", pezzi rimanenti = 0;
		$_POST['n_pezzi'] = 0;


	$allowedExtensions = array("jpg", "jpeg", "png");

	$fileExtension = strtolower(pathinfo($_FILES['imgUp']['name'], PATHINFO_EXTENSION));
	// Controlli

	foreach($allowedExtensions as $aE)
		if($aE == $fileExtension)
			$flag = true;
	if(!$flag)
		extB("Tipo di file non permesso");

	if($_FILES["imgUp"]["size"] > MAX_IMG_SIZE)
		extB("File troppo grande (dimensione massima: " . MAX_IMG_SIZE . " bytes)" . " / Dimensioni del file: " . $_FILES["imgUp"]["size"] . " bytes");

		// Fine controlli
	$newname = round(microtime(true)*1000) . "." . $fileExtension;
	$query = "INSERT INTO Articles (PN, Manufacturer, Seller, Availability, N_Left, Description, IMG, Price, Category) VALUES (?,?,?,?,?,?,?,?,?)";
	$connessione->doQP($query, array($_POST['titolo'], $_POST['produttore'], $_POST['distributore'], $_POST['disponibilita'], $_POST['n_pezzi'], $_POST['descrizione'], $newname, $_POST['prezzo'], $_POST['categoria']));
	$savePath = "img/articoli/" . $newname;
	move_uploaded_file($_FILES["imgUp"]["tmp_name"], $savePath);

	extR("Id dell'articolo inserito: {$connessione->getInsertId()}", "formUpload.php");
?>
