<?php
	session_start();
?>

<html>
<head>
	<title>EStore</title>
	<?php
		include 'links.html';
		require_once 'functions.php';
		setlocale(LC_MONETARY, "it_IT");
	?>
</head>
<body>
	<div class="flexCol" style = "width: 100%; height: auto; position: fixed; ">
	<?php
					include 'header.html';
					$cat = $_GET['categoria'];
					$_GET['search'] = strtolower($_GET['search']);
					$connessione = new DBConn("UData");
					$connessione -> changeApex();
					if(empty($cat) || $cat == 'All')
					{
						$query = "SELECT * FROM Articles WHERE lower(PN) LIKE '%?%'";
						$connessione ->doQP($query, $_GET['search']);
					}
					else
					{
						$query = "SELECT * FROM Articles WHERE lower(PN) LIKE '%?%' AND Category = '?'";
						$connessione ->doQP($query, array($_GET['search'], $cat));	
					}
	?>				
	</div>	
		















		<div class="flexRow" style = "justify-content: center; background: #f4f4f4; width: 100%; height: auto;">

			<div class = "flexRow" style = "margin-top: 80px; margin-bottom: 10px; width: 80%; min-height: 100%; height: auto; flex-wrap: wrap; display: flex; -webkit-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);-moz-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);border-radius: 15px;background: #666; align-content: flex-start;">
			<?php
				while($connessione->fetch())
					
					echo"	<div class = 'flexCol' style = 'height: auto; max-height:280px; width: calc(25% - 20px); margin-top:10px; margin-left:10px; margin-right:10px; border: 2px solid #a1a1a1; background: #dddddd; border-radius: 25px;'>
								<div style = 'display: flex; width: 100%; height: 75%; background-image: url({$connessione->get('IMG')});  background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;'>
								</div>
								<div  class = 'vcenter flexRow' style = ' width: 100%; display: flex;height: 12.5%;'><a class ='vcenter flexRow' style = 'font-size: 14; text-decoration: none; overflow: hidden; display: block; width: auto; heigth: auto; text-overflow: ellipsis; text-wrap:none;' href = 'Display.php?PID={$connessione->get('ID')}'>{$connessione->get('PN')}</a></div>
								<div class = 'center' style = 'display: flex; width: 100%; height: 12.5%;' >".money_format('%.2n',$connessione->get('Price'))."</div>
							</div>";
				?>
			</div>		
		</div>
</body>
</html>