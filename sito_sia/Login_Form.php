<?php
	session_start();
	include 'links.html';
?>
<html>
	<head>
		<title>Login Form</title>
		<link rel="stylesheet" type="text/css" href="css/SSA.css">
    	<link rel="stylesheet" type="text/css" href="css/styleF.css">
	</head>
	<body>
	<p>
	<?php
		if(!isset($_SESSION["loginStatus"])) echo "	<div style = 'text-align: center; margin-top: 25px'>
														<b>Accedi al tuo account</b>
													</div>";
		else
			echo "<h3>Benvenuto/a " . $_SESSION['nome'] . " " . $_SESSION['cognome'] . "</h3>";
		?>
	</p>
		<?php if(!isset($_SESSION["loginStatus"])) echo <<<FORM
		<form method = "POST" action = "./Login.php" >
			<div id = "parent" class = "center">
				<div style = "display: flex; -webkit-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);-moz-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);border-radius: 15px;background: #666;"">
					<div class = "table-left" style = "margin-top:20px;">
						<p><b>Username o email:</b></p>
						<p><b>Password:</b></p>
						<p></p>
					</div>	
					<div class = "table-right" style = "margin-right:5px; margin-top:20px;">
						<p><input name = "username" type = "text"></p>
						<p><input name = "password" type = "password"></p>
						<p><input type = "submit" value = "Accedi"></p>
					</div>
				</div>	
			</div>				
		</form>
FORM;
			else echo <<<FORM


			<form method="post" action="logout.php">
				<p><input type="submit" name="logout" value="Logout"></p>
			</form>
FORM;
		?>
		</form>
	</body>
</html>
