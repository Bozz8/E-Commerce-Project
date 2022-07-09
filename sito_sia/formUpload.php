<?php
	include 'checkifadmin.php';
	include 'categories.php';
?>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/stylezz.css"  href = "<?php echo 'style.css?v=' . time() ?>" />
		<title> Inserimento oggetto </title>

		<script type="text/javascript">
			<?php
				echo 'var main = document.getElementByName("categoria")[0].value;';
			?>
		</script>

	</head>
	<body>
		<form action = "upload.php" method = "post" enctype = "multipart/form-data">
			<p> <input type = "text" name = "titolo" placeholder = "Nome articolo"> </p>
			<p> <input type = "text" name = "produttore" placeholder = "Produttore"> </p>
			<p> <input type = "text" name = "distributore" placeholder = "Distributore"> </p>
			<p>
				<input type = "radio" id = "disp"  name = "disponibilita" value = "1" checked> Disponibile
				<input type = "text" id = "num" name = "n_pezzi" placeholder = "N. pezzi">
				<input type = "radio" name = "disponibilita" value = "2"> In arrivo
				<!-- <input type="radio" name = "esaurito"> Disponibile -->
			</p>
			<p> <input type="text" name = "prezzo" placeholder = "Prezzo" style = "width: 50px"> €</p>
					<select name = "categoria">
						<?php
							foreach($categories as $maincat)
								echo "<option value = '$maincat'>$maincat</option>";
						?>
					</select>
			<p> <textarea name = "descrizione" placeholder="Descrizione..."></textarea>  </p>
			<p> File da caricare... <br/> <input type="file" name="imgUp"> </p>
			<p> <input type="submit" value="Inserisci"> </p>
		</form>
		<form action="adminpanel.php" method="POST">
				<input type="submit" value="Torna al pannello">
		</form>
	</body>
</html>
