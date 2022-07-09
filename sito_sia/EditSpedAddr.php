<meta charset="utf-8"/>
<?php
	include 'CIUIL.php';
?>
<html>
<head>
	<title>Visualizza indirizzi spedizione</title>
	<?php	
		include 'links.html';
	?>
	<link rel="stylesheet" href="css/SSA.css">
</head>
<body>
<?php	
	include 'header.html';
?>
	<div class = "flexRow"> 
<?php	

	$connessione = new DBConn("UData");
	$query = " 	SELECT *
				FROM Indirizzo_Spedizione
				WHERE IDUtente = ?";
				

	$connessione->doQP($query,$_SESSION['UID']);
	if(!$connessione->getNumRows())
		extR("	<div style = 'display: flex; justify-content: center; margin-top: 25px; width:100%'>
					<p>non hai nessun indirizzo di spezione.</p>
				</div>","myaccount.php");
	while($connessione->fetch())
	{
		echo "	<form id = 'Container' action = 'EditSpedAddrForm.php' method = 'POST'>
						<div id = 'Indirizzo'>
							<div class = 'NomeCampo'>
								<p>Nome e Cognome:</p>
								<p>Indirizzo (riga 1):</p>
								";
								if(!empty($connessione->get('Address_2')))
									echo "<p>Indirizzo (riga 2):</p>";
			echo "					
								<p>Città:</p>
								<p>Provincia:</p>
								<p>CAP:</p>
								<p>Paese:</p>
								<p>Telefono:</p>
								<p style = 'margin-top: auto;'><input type = 'submit' value = 'Modifica'></p>
							</div>	
							<div class = 'ValoreCampo'>
								<p>{$connessione->get('Name_Surname')}</p>
								<p>{$connessione->get('Address_1')}</p>
							";
								if(!empty($connessione->get('Address_2')))
									echo "<p>{$connessione->get('Address_2')}</p>";
			echo "					
								<p>{$connessione->get('City')}</p>
								<p>{$connessione->get('Province')}</p>
								<p>{$connessione->get('CAP')}</p>
								<p>{$connessione->get('Paese')}</p>
								<p>{$connessione->get('Phone')}</p>
								<input type = 'text' value = '{$connessione->get('IDShipment')}' name = 'ID' style = 'display: none;'> 
							</div>
						</div>
					</form>";	
	}			
?>
	</div>
</body>
</html>
	

	