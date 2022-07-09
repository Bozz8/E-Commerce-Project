<?php
	session_start();
	setlocale(LC_MONETARY, "it_IT");

	$PID = $_GET['PID'];

	include 'functions.php';

	$Article = getArticleByID($PID);
?>
<html>
<head>
	<title>EStore</title>
	<?php
		include 'links.html';
	?>
</head>
<body>
	<div id="mainwrapper" class="flexCol FSize">
		<?php
			include 'header.html';
		?>
		<div id="bodywrapper" class="flexRow vcenter" style = "width: 100%;">
			<div class = "flexCol hcenter" style = "width: 25%; margin-right: 10px">
				<div style = "background-image: url('<?php echo $Article['IMG'] ?>'); background-size: contain; background-repeat: no-repeat; width: 100%; height: 25%; background-position: 50% 50%; margin-top: 25px;">
				</div>
			</div>
			<div class = "flexCol" style = "width: 50%;">
				<p style = "font-weight: bold; font-size: 1.75em; margin-left: 5px;">
					<?= $Article['PN'];?>
				</p>
				<p>
					<span style = "color: #555; font-size: 0.9em; margin-left: 5px;"> Prezzo: </span>
					<span style = "color: #b12704; font-size: 1.2em;">
						<?php echo money_format('%.2n', $Article['Price']); ?>
					</span>
				</p>
				<p>
					<span style = "color: #555; font-size: 0.9em; margin-left: 5px;"> Distributore: </span>
					<?= $Article['Seller'];?>
				</p>
				<p>
					<span style = "color: #555; font-size: 0.9em; margin-left: 5px;"> Produttore: </span>
					<?= $Article['Manufacturer'];?>
				</p>
				<p style = "font-size: 1.2em; margin-left: 5px;">
					<?php
						switch($Article['Availability'])	{
							case 0:
										echo "<span style = 'color: Red'>Esaurito</span>";
										break;
							case 1:
										echo "<span style = 'color: Green;'>Disponibile: <span style  = 'font-size: 1em; color: Green;'> ".$Article['N_Left']." rimanenti </span> </span>";
										break;
							case 2:
										echo "<span style = 'color: orange'>In arrivo</span>";
										break;
							default:
										break;
						}
					?>
				</p>
				<span style="color: #555; font-size: 0.9em; margin-left: 5px;">
					Descrizione:
				</span>
				<p style = "box-shadow: 0 0 5px; width: 100%; height: auto; padding:3px 7px 3px 7px;"><span style = "color: #555; white-space: pre-wrap;"><?=$Article['Description'];?></span>
				</p>
				<p>
					<form action = "addToBasket.php" method = "POST">
						<?php
							if(isset($_SESSION['UID']) && $Article['Availability'] == 1)
								echo ' 	<input class = "buttonn" type = "submit" value = "Aggiungi al Carrello" name = "basket">
										Quantità:<input type = "number" name = "Quantita" size = 5 value = "1">
										<input type = "hidden" name = "PID" value = "'. $PID .'">';
						?>
					</form>
				</p>
			</div>
        </div>
	</div>

</body>
</html>
