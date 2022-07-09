<?php
	include 'checkifadmin.php';

	$connessione = new DBConn("UData");

	if(isset($_GET['AdminSearch']))
	{
		$connessione->changeApex();
		$query = "SELECT * FROM Articles WHERE lower (PN) LIKE lower('%?%')";
		$connessione->doQP($query, $_GET['AdminSearch']);
	}
	else
	{
		$query = "SELECT * FROM Articles";
		$connessione->doQ($query);
	}
?>

<html>
<head>
	<title>Gestione Inventario</title>
<?php
	include 'links.html';
?>

</head>
<body>
<form action="edit.php" method="GET">
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>PN</th>
				<th>Produttore</th>
				<th>Distributore</th>
				<th>Disponibile</th>
				<th>Quantità</th>
				<th>Selezione</th>
			</tr>
		</thead>
		<tbody>
				<?php
					while ($riga = $connessione->fetch())
							{
								echo "
									<tr>
										<td>
											{$riga['ID']}
								 		</td>
										<td>
											{$riga['PN']}
								 		</td>
								 		<td>
											{$riga['Manufacturer']}
								 		</td>
								 		<td>
											{$riga['Seller']}
								 		</td>
								 		<td>";
											if($riga['Availability'] == 1)
												echo "Disponibile";
											if($riga['Availability'] == 0)
												echo "Non Disponibile";
											if($riga['Availability'] == 2)
												echo "In arrivo";
										echo "
								 		</td>
								 		<td>
											{$riga['N_Left']}
								 		</td>
										<td>
											<input type = 'radio' value = '{$riga['ID']}' name = 'toedit'></p>
										</td>
									</tr>";
								}
				?>

		</tbody>
	</table>
	<input type = "submit" value = "Edita selezione" style = "margin: 5px 0 0 5px;">
	<br>
</form>
<form action="adminpanel.php">
	<input type = "submit" value = "Torna al pannello" style = "margin: 5px 0 0 5px;">
</form>
<form action="editItemsPanel.php">
	<input type = "submit" value = "Torna" style = "margin: 5px 0 0 5px;">
</form>
</body>
</html>
