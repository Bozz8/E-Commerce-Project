<?php
     include 'checkifadmin.php';
?>

<html>
<head>
	<title> Elimina</title>
</head>
<body>
	<form action = "DeleteArticles.php">
		<input type = "submit" value = "Visualizza tutto il magazzino"> Oppure...
	</form>
	<form action = "DeleteArticles.php" method = "GET">
		<input type = "text" name = "AdminSearch" placeholder = "Nome articolo">
		<input type = "submit" value = "Cerca articoli">
	</form>
</body>
</html>
