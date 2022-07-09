<?php
	include 'checkifadmin.php';
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
		<div id="topbar" class="flexRow">
			<div class="logo">
			</div>
			<div class="search">
				<form action = "Search_Products.php" method = "GET">
					<input class="searchbar" type="search" name="search" size="200" placeholder="Cerca...">
				</form>
			</div>

			<div class = "links">
				<?php
					echo "Benvenuto " . $_SESSION['nome'] . " " . $_SESSION['cognome'];
				?>

			</div>
		</div>


		<div id="Title" class="flexRow">
          	<a href="Catalogo.php"><i class="fa fa-list"></i> Catalogo</a>
       		<div class="login_wrapper">
       			<?php
       				if(!isset($_SESSION["loginStatus"])) echo '
       						<span>Accedi:</span>
								<form action="Login.php" method="POST">
									<input id="userbox" type="text" name="username" placeholder="Username" size="15">
									<input type="password" name="password" placeholder="Password" size="15">
									<input type="submit" name="" style = "display:none;">
								</form>';
					else echo '
								<form action="Logout.php" method="POST">
									<button type = "submit">
										<i class="fa fa-sign-out" aria-hidden="true">Termina sessione</i>
									</button>									
								</form>';

       			?>
       		</div>
		</div>

		<div class = "flexCol" style = "width: 300px; max-width: 25%; height: 100%; background:#f4f4f4;">
			<div class = "category">
				<li style = "margin-left: 5px;"><b>I tuoi strumenti</b></li>
			</div>
			<div class = "lowerlinks">
				<a href="formUpload.php"><i class="fa fa-upload" aria-hidden="true"> Inserisci un prodotto </i></a>
			</div>
			<div class = "lowerlinks">	
				<a href="editItemsPanel.php"><i class="fa fa-pencil-square-o" aria-hidden="true"> Modifica un prodotto</i></a>
			</div>
			<div class = "lowerlinks">
				<a href = "EditHL.php"><i class="fa fa-list" aria-hidden="true"> Modifica prodotti in evidenza</i></a>
			</div>
			<div class = "lowerlinks">	
				<a href="MainView.php"><i class="fa fa-list" aria-hidden="true"> Elimina prodotti</i></a>
			</div>
			<div class = "lowerlinks">	
				<a href="ViewOrder.php"><i class="fa fa-book" aria-hidden="true"> Visualizza ordini degli utenti</i></a>
			</div>
			<div class = "lowerlinks">	
				<a href="Stats.php"><i class="fa fa-bar-chart" aria-hidden="true"> Statistica vendite</i></a>
			</div>
		</div>
	</div>

</body>
</html>
