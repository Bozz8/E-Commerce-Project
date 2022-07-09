<?php  
	include 'CIUIL.php';
	setlocale(LC_MONETARY, "it_IT");
?>

<html>
	<head>
		<title>I tuoi ordini</title>
		<?php
    		include 'links.html';
    	?>
		<link rel="stylesheet" href="css/SSA.css">
	</head>
	<body>
		<?php	
			include 'header.html';
		?>
			<div> 
				<?php
					$connessione = new DBConn("UData");
					$query = "	SELECT * FROM Ricevuta WHERE IDUtente = ?";
					$connessione->doQP($query,$_SESSION['UID']);

					if(!$connessione->getNumRows())
						echo"	<p style = 'text-align:center;'>Non hai acquistato nessun prodotto.</p>";
					
					while($connessione->fetch())
					{	
						echo "	<div id = 'Container'>
									<div id = 'Indirizzo'>
										<div class = 'NomeCampo'>
											<p>Ordine N°: </p>
											<p>Prodotti acquistati: </p>
											<p>Prezzo totale: </p>
											<p><a href = 'ricevute/{$connessione->get('PDF')}' target='_blank'>Stampa ricevuta</a></p>
										</div>	
										<div class = 'ValoreCampo'>
											<p>{$connessione->get('IDOrdine')}</p>
											<p><span style = 'white-space: pre-line'>{$connessione->get('NomeProdotto')}</span></p>
											<p>".money_format('%.2n', $connessione->get('Prezzo'))."</p>	
											<p></p>
										</div>
									</div>
								</div>";	
					}
				?>
			</div>

	</body>
</html>	