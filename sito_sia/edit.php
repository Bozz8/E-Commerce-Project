<?php
require_once 'checkifadmin.php';
require_once 'categories.php';
require_once 'functions.php';
?>
<?php
	if(empty($_GET['toedit']))
		extB("Nessun elemento selezionato.");
	$riga = getArticlebyID($_GET['toedit']);
?>
<html>
	<head>
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo 'css/style.css?v=' . time() ?>" /> -->
		<title> Edit Articolo </title>
		<style>
			p 
			{
				height: 20px;
			}
		</style>
	</head>
	<body>
	 <form action="editAction.php" method = "POST">
		<span style = "width: 150px; float: left">
			<p> Nome Articolo </p>
			<p> Produttore </p>
			<p> Distributore </p>
			<p> Disponibilità </p>
			<p> N. Pezzi </p>
			<p> Prezzo </p>
			<p> Categoria </p>
			<p> Descrizione </p>
			<p> <input type = "submit" value = "Modifica" style = "margin-top: 25px; width: 100px" > </p>
		</span>
		<span style = "float: left">
			<p>  <input type = "text" name = "PN" placeholder = "Nome articolo" value = "<?php echo $riga['PN']; ?>" > </p>
			<p>  <input type = "text" name = "Manufacturer" placeholder = "Produttore" value = "<?php echo $riga['Manufacturer']; ?>" > </p>
			<p>  <input type = "text" name = "Seller" placeholder = "Distributore" value = "<?php echo $riga['Seller']; ?>" > </p>
			<p> 
				<input type = "radio" id = "disp"  name = "Availability" value = "1" <?php if($riga['Availability'] == 1) echo "checked"; ?> > Disponibile
				<input type = "radio" name = "Availability" value = "2" <?php if($riga['Availability'] == 2) echo "checked"; ?> > In arrivo
                <input type = "radio" name = "Availability" value = "0" <?php if($riga['Availability'] == 0) echo "checked"; ?> > Non disponibile
			</p>
			<p>
				 <input type = "text" id = "num" name = "N_Left" style = "width: 50px" placeholder = "N. pezzi" value = "<?php echo $riga['N_Left']?>" >
			</p>
			<p>  <input type="text" name = "Price" placeholder = "Prezzo" style = "width: 75px" value = "<?php echo $riga['Price']?>" > €</p>
					 <select name = "Category">
						<?php
							foreach($categories as $maincat)
							{
								echo "<option value = '$maincat'";
								if(!strcmp($maincat, $riga['Category']))
									echo " selected";
								echo ">$maincat</option>";
							}
						?>
					</select>
			<p> <textarea name = "Description" style = "width: 300px; height: 300px;" placeholder="Descrizione..."><?php echo $riga['Description']?></textarea>  </p>
            <input type = "hidden" value = "<?php echo $_GET['toedit'];?>" name = "PID" >
		</span>
		</form>
	</body>
</html>
