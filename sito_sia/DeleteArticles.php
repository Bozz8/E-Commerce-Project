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
	<script>
	function CKALL(unck){
		var inputs = document.getElementsByTagName('input');
		for (var i = 0; i < inputs.length ; i++) {
			var node = inputs [i];
			if (node.getAttribute('type') == 'checkbox')
				if (unck == 1)
					node.checked = false;
				else
					node.checked = true;
		}
	}		
	</script>
<?php
	include 'links.html';
?>

</head>
<body>
<form action="DeleteItems.php" method="POST">
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
									<input type = 'checkbox' value = '{$riga['ID']}' name = 'todelete[]'>
								</td>
							</tr>";
					}
					echo "		<td colspan = 4>
									<input type= 'button' onclick = 'CKALL()'' name= 'selectAll' value = 'Seleziona Tutto'>
								</td>
								<td colspan = 3>	
									<input type= 'button' onclick = 'CKALL(1)'' name= 'selectAll' value = 'Deleziona Tutto'>
								</td>";	
				?>			
		</tbody>
	</table>
	<input type = "submit" value = "Elimina selezione" style = "margin: 5px 0 0 5px;">
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
