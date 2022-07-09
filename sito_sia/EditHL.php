<?php
	include 'checkifadmin.php';
	require_once 'functions.php';


	$connessione = new DBConn("UData");
	
	if(isset($_GET['AdminSearch']))
	{
		$query = "SELECT * FROM Articles WHERE lower(PN) LIKE lower('%?%')";
		$connessione->changeApex();
		$connessione->doQP($query, $_GET['AdminSearch']);
	}
	else
		$connessione->doQ("SELECT * FROM Articles");
?>
<html>
<head>
	<title>Gestione Inventario</title>
<?php
	include 'links.html';
?>

</head>
<body>
<form action="EditHLAction.php" method="POST">
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
									<input type = 'checkbox' value = '{$riga['ID']}' name = 'toHL[]' ";
									if($riga['HL'] == 1)
										echo "checked";

									echo">
								</td>
							</tr>";
					}
				?>			
		</tbody>
	</table>
	<input type = "submit" value = "Metti in evidenza i prodotti selezionati" style = "margin: 5px 0 0 5px;">
	<br>
</form>
<form action="adminpanel.php">
	<input type = "submit" value = "Torna al pannello" style = "margin: 5px 0 0 5px;">
</form>	
<form action="MainView.php">
	<input type = "submit" value = "Torna" style = "margin: 5px 0 0 5px;">
</form>
</body>
</html>
