<?php
     include 'checkifadmin.php';
?>

<html>
<head>
	<title> Ordini</title>
</head>
<body>
	<form action = "ViewOrderAction.php">
		<input type = "submit" value = "Visualizza tutti gli ordini"> Oppure...
	</form>
	<form action = "ViewOrderAction.php" method = "GET">
		<input type = "text" name = "AdminSearch" placeholder = "Username utente">
		<input type = "submit" value = "Cerca utenti per username">
	</form>
	<form action = "ViewOrderAction.php" method = "GET">
		<input type = "text" name = "AdminSearchMail" placeholder = "Email utente">
		<input type = "submit" value = "Cerca utenti per email">
	</form>
</body>
</html>