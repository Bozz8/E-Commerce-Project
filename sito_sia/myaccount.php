<?php
	include 'CIUIL.php';
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
			$connessione = new DBConn("UData");
			$connessione->doQP("SELECT Username,Name,Surname,Birth_Date,Email FROM RegisterData WHERE ID = ?", $_SESSION['UID']);
			$connessione->fetch();
		?>
		<div class = "flexCol" style = "width: 300px; max-width: 25%; height: 100%; background:#f4f4f4;">
			<div class = "category">
				<li style = "margin-left: 3px;"><b>I tuoi dati</b></li>
			</div>
			<div class = "lowerlinks">
				<span><b>Username:</b></span>
				<span style = "margin-left: 5px;">
					<?=$connessione->get("Username")?>
				</span>
			</div>
			<div class = "lowerlinks">
				<span><b>Nome:</b></span>
				<span style = "margin-left: 5px;">
					<?=$connessione->get("Name")?>
				</span>
			</div>
			<div class = "lowerlinks">
				<span><b>Cognome:</b></span>
				<span style = "margin-left: 5px;">
					<?=$connessione->get("Surname")?>
				</span>
			</div>
			<div class = "lowerlinks">
				<span><b>Data di nascita:</b></span>
				<span style = "margin-left: 5px;">
					<?=$connessione->get("Birth_Date")?>
				</span>
			</div>
			<div class = "lowerlinks" style = "margin-bottom: auto">
				<span><b>email:</b></span>
				<span style = "margin-left: 5px;">
					<?=$connessione->get("Email")?>
				</span>
			</div>
			<div class = "category" >
				<li style = "margin-left: 3px;"><b>Ordini</b></li>
			</div>
				<div class = "lowerlinks">
					<a href = "VisualizzaOrdini.php"><i class="fa fa-book" aria-hidden="true"> Visualizza ordini</i></a>
				</div>
			<div class = "category">
				<li style = "margin-left: 3px;"><b>Impostazioni Account</b></li>
			</div>
				<div class = "lowerlinks">
					<a href = "AddSpedAddrForm.html"><i class="fa fa-building-o" aria-hidden="true"> Aggiungi Indirizzo di spedizione</i></a>
				</div>
				<div class = "lowerlinks">
					<a href = "EditSpedAddr.php"><i class="fa fa-building-o" aria-hidden="true"> Visualizza/Modifica Indirizzi di spedizione</i></a>
				</div>
				<div class = "lowerlinks">
					<a href = "AddFattAddrForm.html"><i class="fa fa-usd" aria-hidden="true"> Aggiungi Indirizzo di fatturazione</i></a>
				</div>
				<div class = "lowerlinks">
					<a href = "EditFattAddr.php"><i class="fa fa-usd" aria-hidden="true"> Visualizza/Modifica Indirizzi di fatturazione</i></a>
				</div>
				<div class = "lowerlinks">
					<a href = "EditPassForm.html"><i class="fa fa-key" aria-hidden="true"> Modifica password</i></a>
				</div>
				<div class = "lowerlinks">
					<a href = "EditMailForm.html"><i class="fa fa-envelope" aria-hidden="true"> Modifica email</i></a>
				</div>
				<div class = "lowerlinks" style = "margin-bottom: auto">
					<a href = "EliminaAccount.php"><i class="fa fa-trash-o" aria-hidden="true"> !!!Elimina Account!!!</i></a>
				</div>
		</div>
			
	</div>
	
</body>
</html>