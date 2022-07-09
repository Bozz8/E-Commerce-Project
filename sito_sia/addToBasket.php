<?php
	header("Refresh:3; url=Display.php?PID={$_POST['PID']}");
	require_once 'CIUIL.php';
?>
<html>
<head>
	<title>EStore</title>
	<?php
		require_once 'links.html';
		require_once 'functions.php';
	?>
</head>
<body>
	<div id="mainwrapper" class="flexCol FSize">
		<?php
			require_once 'header.html';
		?>
		<?php
			if($_POST['Quantita'] < 1)
				extB("Valore inserito nel campo quantità non valido");

			$connessione = new DBConn("UData");
			$query = "	SELECT Quantity FROM Basket WHERE UID = ? AND AID = ?";
			$connessione->doQP($query, array($_SESSION['UID'], $_POST['PID']));
			$connessione->fetch();
			$QuantitaPresente = $connessione->get('Quantity');

			$query = "	SELECT N_Left,Availability FROM Articles WHERE ID = ?";
			$connessione->doQP($query,$_POST['PID']);
			$connessione->fetch();
			if($connessione->get('Availability') != 1)
				extB("Impossibile aggiungere al carrello");
			if( (($_POST['Quantita']+$QuantitaPresente) > $connessione->get('N_Left')) || (($_POST['Quantita']+$QuantitaPresente) === $connessione->get('N_Left')))
				extB("Non è possibile aggiungere al carrello più articoli.");


			$query = "	SELECT AID, UID FROM Basket WHERE UID = ? AND AID = ?";
			$connessione->doQP($query, array($_SESSION['UID'], $_POST['PID']));
			if($connessione->getNumRows())	{
				$query = "	UPDATE Basket
							SET Quantity = Quantity + ?
							WHERE UID = ? AND AID = ?";
			}
			else
				$query = "INSERT INTO Basket (Quantity, UID, AID) VALUES (?, ?, ?)";

			$connessione->doQP($query, array($_POST['Quantita'],$_SESSION['UID'], $_POST['PID']));
			echo "Articolo aggiunto al carrello";
			
		?>
	</div>
</body>
</html>
