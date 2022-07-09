<?php
	include 'CIUIL.php';
?>

<html>
<head>
	<title>Carrello</title>
	<style type="text/css">
		input[type=checkbox]
		{
			display: none;

		} 
		input[type=checkbox]:checked + label
		{
		 	background-color: rgb(183,191,220);
		} 
		label
		{
			background-color: #dddddd; 
		}
		li a
		{
			cursor: pointer;
			text-decoration: none;
		}
	</style>
	<?php
		include 'links.html';
	?>
		<script>
		function CKALL(unck){
			var inputs = document.getElementsByTagName('input');
			for (var i = 0; i < inputs.length ; i++) {
				var node = inputs[i];
				if (node.getAttribute('type') == 'checkbox')
					if (unck == 1)
						node.checked = false;
					else
						node.checked = true;
			}
		}
		function Remove()
		{
			document.Carrello.submit();
		}	
		</script>
</head>
<body style = "background: #f4f4f4;">
<?php
			include 'header.html';
			$connessione = new DBConn("UData");
			$query = "	SELECT * FROM (SELECT * FROM Basket
							WHERE UID = ?) A
							LEFT JOIN Articles B
							ON A.AID = B.ID";

				$connessione->doQP($query, $_SESSION['UID']);
				$result = $connessione->getResult();

				if(!$connessione->getNumRows())
					exit("<p style = 'text-align:center;'> Nessun articolo presente nel carrello</p>");
				while($riga = $result->fetch_array())
					if($riga['N_Left'] <= 0)
					{
						$query = "DELETE FROM Basket WHERE UID = ? AND AID = ?";
						$connessione->doQP($query, array($_SESSION['UID'], $riga['AID']));
						echo "	<p>L'articolo {$riga['PN']} è stato automaticamente rimosso dal carrello in quanto non più disponibile.</p>";
					}

				$query = "	SELECT * FROM (SELECT * FROM Basket
							WHERE UID = ?) A
							LEFT JOIN Articles B
							ON A.AID = B.ID";

				$connessione->doQP($query, $_SESSION['UID']);	

				if(!$connessione->getNumRows())
					exit("<p style = 'text-align:center;'> Nessun articolo presente nel carrello</p>");	
		?>	
	<div style = "position: fixed;margin-left: 5px; margin-top: 80px; width: 175px;">
		<ul>
			<li onclick = "CKALL()"><a>Seleziona tutto</a></li>
			<li onclick = "CKALL(1)"><a>Deseleziona tutto</a></li>
			<li onclick = "Remove()"><a>Rimuovi articoli</a></li>
			<li><a href = "ConfermaOrdine.php">Procedi con l'acquisto</a></li>

		</ul>
	</div>
	<div class="flexCol" style = "width: 100%; height: auto; position: fixed; ">
		
	</div>	
		<div class="flexRow" style = "justify-content: center; width: 100%; height: auto;">

			<form method = "POST" action = "RemoveFBasket.php" name = "Carrello" class = "flexRow" style = "margin-top: 80px; margin-bottom: 10px; padding-bottom: 10px;  width: 80%; min-height: auto; height: auto; flex-wrap: wrap; display: flex; -webkit-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);-moz-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);border-radius: 15px;background: #666; align-content: flex-start;">
			
					<?php
						$i = 0;
						while($connessione->fetch())
						{
							$i++;
							echo"	
										<input type = 'checkbox' name = 'basketRemove[]' value = '{$connessione->get('AID')}' id = 'c$i' style = 'display:none;'></input>
										<label for = 'c$i' class = 'flexCol' style = 'height: auto; max-height:280px; width: calc(25% - 20px); margin-top:10px; margin-left:10px; margin-right:10px; border: 2px solid #a1a1a1; border-radius: 25px;'>
											<div style = 'display: flex; width: 100%; height: 75%; background-image: url({$connessione->get('IMG')});  background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;'>
											</div>
											<div  class = 'vcenter flexRow' style = ' width: 100%; display: flex;height: 12.5%;'><a class ='vcenter flexRow' style = 'font-size: 14; text-decoration: none; overflow: hidden; display: block; width: auto; heigth: auto; text-overflow: ellipsis; text-wrap:none;' href = 'Display.php?PID={$connessione->get('ID')}'>{$connessione->get('PN')}</a></div>
											<div class = 'center' style = 'display: flex; width: 100%; height: 12.5%;' >Quantità: {$connessione->get('Quantity')}</div>
										</label>";	
						}				
						?>
			</form>		
		</div>
</body>
</html>