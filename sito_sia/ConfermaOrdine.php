<?php  
	include 'CIUIL.php';
	setlocale(LC_MONETARY, 'it_IT.UTF-8');
?>

<html>
	<head>
		<title>Conferma Ordine</title>
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
				<form action = "Acquista.php" method = "POST">
				<?php
						$connessione1 = new DBConn("UData");
						$connessione2 = new DBConn("UData");
						$query = " 	SELECT *
									FROM Indirizzo_Spedizione
									WHERE IDUtente = ?";

						$connessione1->doQP($query,$_SESSION['UID']);
						$connessione1->close();
						if(!$connessione1->getNumRows())
							extR("	<div style = 'display: flex; justify-content: center; margin-top: 25px; width:100%'>
										<p>non hai nessun indirizzo di spezione.<br>
										<a href = 'AddSpedAddrForm.html'>Clicca qua per aggiungerne uno</a></p>
									</div>","myaccount.php");


						echo"	<p><b>I tuoi indirizzi di spedizione:</b><select name= 'indirizzoSpedizione'>";
						
						while($connessione1->fetch())	
						{
							echo"	
									<option value = '{$connessione1->get('IDShipment')}'>{$connessione1->get('Name_Surname')}, {$connessione1->get('Address_1')} {$connessione1->get('Address_2')}, {$connessione1->get('City')}, {$connessione1->get('Province')}, {$connessione1->get('CAP')}, {$connessione1->get('Paese')}, {$connessione1->get('Phone')}
									</option>";
						}
						echo "	</select></p>";

						
						$query = " 	SELECT *
									FROM Indirizzo_Fatturazione
									WHERE IDUtente = ?";

						$connessione2->doQP($query,$_SESSION['UID']);
						$connessione2->close();
						if(!$connessione2->getNumRows())
							echo "		<p>non hai nessun indirizzo di fatturazione.<br>
										<a href = 'AddFattAddrForm.html'>Clicca qua per aggiungerne uno</a></p>
										<p>oppure utilizza lo stesso indirizzo di quello di spedizione 
										<input type = 'checkbox' name = 'same' value = '1'></p>";
						else
						{
							echo"	<p><b>I tuoi indirizzi di fatturazione:</b>
									<input type = 'checkbox' name = 'same' value = '1' checked style = 'display:none'><select name= 'indirizzoFatturazione'>";
							
							while($connessione2->fetch())	
							{
								echo"	
										<option value = '{$connessione2->get('IDBilling')}'>{$connessione2->get('Name_Surname')}, {$connessione2->get('Address_1')} {$connessione2->get('Address_2')}, {$connessione2->get('City')}, {$connessione2->get('Province')}, {$connessione2->get('CAP')}, {$connessione2->get('Paese')}, {$connessione2->get('PartitaIVA')}
										</option>";
							}
							echo "	</select></p>";
						}
						echo "	<p style = 'margin-top: 40px;'>--Riepilogo ordine--</p>";
						$connessione = new DBConn("UData");
						$query ="	SELECT *
									FROM Articles
									RIGHT JOIN (SELECT * FROM Basket WHERE UID = ?) A
									ON Articles.ID = A.AID";

						$connessione->doQP($query,$_SESSION['UID']);
						$totale = 0;
						while($connessione->fetch())
						{	
							$totale+= $connessione->get('Quantity')*$connessione->get('Price');
							echo "<p> <span>{$connessione->get('PN')}</span> <span style='margin-left: 30px;'>Quantità: {$connessione->get('Quantity')}</span> </p>";
						}	
				?>
				<?php
						echo "	<p>Totale ordine: ".money_format('%.2n',$totale)."</p>	
								<input type = 'submit' value = 'Conferma'>";
						

						
				?>
				</form>
			</div>	
	</body>	
</html>