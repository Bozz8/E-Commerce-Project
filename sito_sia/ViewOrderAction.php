<?php
	include 'checkifadmin.php';

	$connessione = new DBConn("UData");

	if(isset($_GET['AdminSearch']))
	{
		$query = "	SELECT * FROM Ricevuta 
					WHERE IDUtente = (SELECT ID FROM RegisterData WHERE lower(Username) = lower(?))";
		$connessione->doQP($query, $_GET['AdminSearch']);
	}
	elseif(isset($_GET['AdminSearchMail']))
	{
		$query = "	SELECT * FROM Ricevuta 
					WHERE email = ?";
		$connessione->doQP($query, $_GET['AdminSearchMail']);
	}
	else
	{
		$query = "SELECT * FROM Ricevuta";
		$connessione->doQ($query);
	}
?>	

	<html>
<head>
	<title>Gestione ordini</title>
<?php
	include 'links.html';
?>

</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID Ordine</th>
				<th>ID Utente</th>
				<th>Ricevuta</th>
				<th>Prodotti ordinati</th>
				<th>Totale</th>
				<th>Data acquista</th>
				<th>email</th>
			</tr>
		</thead>
		<tbody>
				<?php
					while ($riga = $connessione->fetch())
								echo "
									<tr>
										<td>
											{$riga['IDOrdine']}
								 		</td>
										<td>
											{$riga['IDUtente']}
								 		</td>
								 		<td>
								 			<a href = 'ricevute/{$riga['PDF']}' target='_blank'>Visualizza ricevuta</a>
										</td>
								 		<td>
											{$riga['NomeProdotto']}
								 		</td>
								 		<td>
											{$riga['Prezzo']}
								 		</td>
										<td>
											{$riga['Data_Ordine']}
										</td>
										<td>
											{$riga['email']}
										</td>
									</tr>";

				?>

		</tbody>
	</table>
</body>
</html>