<?php
     include 'checkifadmin.php';
?>

<html>
<head>
	<title> Edit</title>
</head>
<body>
	<form action = "editItems.php">
		<input type = "submit" value = "Visualizza tutto il magazzino"> Oppure...
	</form>
	<form action = "editItems.php" method = "GET">
		<input type = "text" name = "AdminSearch" placeholder = "Nome articolo">
		<input type = "submit" value = "Cerca articoli">
	</form>
</body>
</html>
