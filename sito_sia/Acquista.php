<?php
	include 'CIUIL.php';
	if(!isset($_POST['indirizzoSpedizione']))
		extB("Non hai selezionato alcun indirizzo di spedizione");
	if(!isset($_POST['same']))
		extB("Non hai selezionato alcun indirizzo di fatturazione.");
	if($_POST['same'] != 1)
		extB("Non hai selezionato alcun indirizzo di fatturazione.");

	$connessione = new DBConn("UData");
	$query ="	SELECT *
				FROM Articles
				RIGHT JOIN (SELECT * FROM Basket WHERE UID = ?) A
				ON Articles.ID = A.AID";

	$connessione->doQP($query,$_SESSION['UID']);
	if($connessione->getNumRows() == 0)
		extR("Non hai articoli nel carrello", "myaccount.php");
	$Articoli = array();

	while ($connessione->fetch())
			if($connessione->get('N_Left') <= 0)
			extR("Uno o più articoli risultano non disponibili","Basket.php");
		else
			array_push($Articoli, array($connessione->get('AID'),$connessione->get('Quantity')));


	$query ="	SELECT *
				FROM Articles
				RIGHT JOIN (SELECT * FROM Basket WHERE UID = ?) A
				ON Articles.ID = A.AID";

	$connessione->doQP($query,$_SESSION['UID']);
	$NomiProdotti = "";
	$PrezzoTotale = 0;
	while($connessione->fetch())
	{
		$NomiProdotti.=$connessione->get('Quantity')." x ".$connessione->get('PN')."\n";
		$PrezzoTotale +=$connessione->get('Price')*$connessione->get('Quantity');
	}



	$NomePDF = round(microtime(true)*1000).".pdf";

	

	$query = "	INSERT INTO Ricevuta(IDUtente,PDF,NomeProdotto,Prezzo,Data_Ordine,email) VALUES (?,?,?,?,?,?)";
	$connessione->doQP($query,array($_SESSION['UID'],$NomePDF,$NomiProdotti,$PrezzoTotale,date("Y-m-d H:i:s"),$_SESSION['Mail']));
	
	$idRicevuta = $connessione->getInsertId();	
	
	
	
	
	
	// CREAZIONE DEL PDF
	
	$query ="	SELECT *
				FROM Articles
				RIGHT JOIN (SELECT * FROM Basket WHERE UID = ?) A
				ON Articles.ID = A.AID";

	$connessione->doQP($query,$_SESSION['UID']);
	
	
	
	require('pdf/fpdf.php');


	$pdf = new FPDF();
	$pdf->AddPage();

	$pdf->Image('img/titlelogo.png',10,10,50);
	$pdf->SetFont('Arial','B', 6);
	$pdf->Ln(10);
	$pdf->Write(3, "Estore S.R.L\nSede Legale: Viale delle Scienze, 4\nN. Telefono 091-123-456-79\nP.IVA: IT12345678911");
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0, 10, "Ricevuta d'acquisto Num $idRicevuta del " . date('d/m/Y'), 'C');

	
	$pdf->Ln(14);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetTextColor(51, 153, 255);
	$pdf->Write(6, "Prodotti Acquistati:\n");
	$pdf->Ln(7);
	
	while($connessione->fetch())
	{
		$pdf->SetTextColor(51, 51, 204);
		$pdf->Write(6, "Nome prodotto: ");
		$pdf->SetTextColor(0);
		$pdf->Write(6, $connessione->get('PN')."\n");

		$pdf->SetTextColor(255, 51, 0);
		$pdf->Write(6, "Venduto da: ");
		$pdf->SetTextColor(0);
		$pdf->Write(6, $connessione->get('Seller')."\n");

		$pdf->SetTextColor(255, 51, 0);
		$pdf->Write(6, "Prezzo: ");
		$pdf->SetTextColor(0);
		$pdf->Write(6, $connessione->get('Quantity')." x EUR ".$connessione->get('Price')." = EUR " . $connessione->get('Price')*$connessione->get('Quantity')."\n");
		$pdf->Ln(10);
	}
	if($_POST['same'] == 1)
	{
		$query = "	INSERT INTO Indirizzo_Fatturazione (IDUtente,Name_Surname,Address_1,Address_2,City,Province,CAP,Paese) 
				SELECT IDUtente,Name_Surname,Address_1,Address_2,City,Province,CAP,Paese
				FROM Indirizzo_Spedizione WHERE IDShipment = ?";
		$connessione->doQP($query,$_POST['indirizzoSpedizione']);
		$_POST['indirizzoFatturazione'] = $connessione->getInsertId();	
	}

	$query = "SELECT * FROM Indirizzo_Fatturazione WHERE IDBilling = ?";
	$connessione->doQP($query, $_POST['indirizzoFatturazione']);
	$connessione->fetch();
	
	
	$pdf->SetTextColor(51, 153, 255);
	$pdf->Write(6, "Totale ordine: ");
	$pdf->SetTextColor(0);
	$pdf->Write(6, "EUR $PrezzoTotale\n");

	$pdf->Ln(10);
	$pdf->SetTextColor(51, 153, 255);
	$pdf->Write(6, "Informazioni di fatturazione: \n");
	$pdf->SetTextColor(255, 51, 0);
	$pdf->Write(6, "Nome e cognome:\n");
	$pdf->SetTextColor(0);
	$pdf->Write(6, $connessione->get('Name_Surname') . "\n");

	$pdf->SetTextColor(255, 51, 0);
	$pdf->Write(6, "Indirizzo:\n");
	$pdf->SetTextColor(0);
	$pdf->Write(6, "{$connessione->get('Address_1')}\n");
	if(!empty($connessione->get('Address_2')))
		$pdf->Write(6, "{$connessione->get('Address_2')}\n");
	$pdf->Write(6, "{$connessione->get('City')} {$connessione->get('Province')} {$connessione->get('CAP')}\n");
	$pdf->Write(6, "{$connessione->get('Paese')}\n");

	$pdf->SetTextColor(255, 51, 0);
	if(!empty($connessione->get('PartitaIVA')))
	{
		$pdf->Write(6, "Partita IVA:\n");
		$pdf->SetTextColor(0);
		$pdf->Write(6, "{$connessione->get('PartitaIVA')}\n");
	}

	$pdf->Output("F", "ricevute/" . $NomePDF);
	
	// FINE CREAZIONE PDF
	






	$connessione->changeApex();	
	foreach ($Articoli as $arr)
	{
			$query = "UPDATE Articles SET N_Left = N_Left - ? WHERE ID = ?";
			$connessione->doQP($query,array($arr[1],$arr[0]));
			$query = "SELECT N_Left FROM Articles WHERE ID = ?";
			$connessione->doQP($query,$arr[0]);
			$connessione->fetch();
			if($connessione->get('N_Left') == 0)
				$connessione->doQP("UPDATE Articles SET Availability = 0 WHERE ID =?", $arr[0]);
	}


	$query = "	DELETE FROM Basket WHERE UID = ?";
	$connessione->doQP($query,$_SESSION['UID']);
	extR("Acquisto completato con successo!","myaccount.php");

		
?>