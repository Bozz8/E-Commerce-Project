<?php
	session_start();
?>

<html>
<head>
	<title>EStore</title>
	<?php
		include 'links.html';
		include 'functions.php';
	?>
</head>
<body>
	<div id="mainwrapper" class="flexCol FSize center">
		<?php
			include 'header.html';
			$connessione = new DBConn("UData");
			$connessione->doQ("SELECT * FROM Articles WHERE HL = 1 ");
		?>
		<h1 style = "color: #a1a1a1;"><b>Prodotti in evidenza</b></h1>
		<div class="flexRow" style = "justify-content: center; background: #f4f4f4; width: 100%; height: auto;">
			<div class = "flexRow" style = "margin-top: 15px; margin-bottom: 10px; width: 80%; min-height: 100%; height: auto; flex-wrap: wrap; display: flex; -webkit-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);-moz-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);border-radius: 15px;background: #666; align-content: flex-start;">
			<?php
				while($connessione->fetch())
				{
					echo"	<div class = 'flexCol' style = 'height: auto; max-height:280px; width: calc(25% - 20px); margin-top:10px; margin-left:10px; margin-right:10px; border: 2px solid #a1a1a1; background: #dddddd; border-radius: 25px;'>
								<div style = 'display: flex; width: 100%; height: 75%; background-image: url({$connessione->get('IMG')});  background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;'>
								</div>
								<div  class = 'vcenter flexRow' style = ' width: 100%; display: flex;height: 12.5%;'><a class ='vcenter flexRow' style = 'font-size: 14; text-decoration: none; overflow: hidden; display: block; width: auto; heigth: auto; text-overflow: ellipsis; text-wrap:none;' href = 'Display.php?PID={$connessione->get('ID')}'>{$connessione->get('PN')}</a></div>
								<div class = 'center' style = 'display: flex; width: 100%; height: 12.5%;' >";
									if($connessione->get('Availability') == 0)
										echo "<span style = 'color: red'>Esaurito</span>";
									elseif($connessione->get('Availability') == 1)
										echo "<span style = 'color: green'>".money_format('%.2n',$connessione->get('Price'))."</span>";
									else 
										echo "<span style = 'color: orange'>In arrivo</span>";
							echo "</div>
							</div>";
				}
				?>
			</div>		
		</div>
	</div>	
</body>
</html>
