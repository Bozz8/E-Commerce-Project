<?php
	session_start();
	include 'links.html';
	if(isset($_SESSION["loginStatus"]))
		if (!strcmp($_SESSION["loginStatus"], "logged_as_admin"))	header("Location: adminpanel.php");
?>

<html>
<head>
	<title>Pagina di login Admin</title>
	<link rel="stylesheet" type="text/css" href="css/styleF.css">
	<link rel="stylesheet" type="text/css" href="css/SSA.css">
</head>
<body>
	<form action="adminconn.php" method="POST">
	<h1 class = "center flexRow" style = "width:100%; " >Pagina di login dell'admin</h1>
		<div id = "parent" class = "center">
			<div style = "display: flex; -webkit-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);-moz-box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);box-shadow: 5px 5px 25px 5px rgba(0,0,0,0.75);border-radius: 15px;background: #666;"">
	
				<div class = "table-left" style = "margin-top:20px;">
					<p>User:</p>
					<p>Password:</p>
					<p></p>
				</div>
				<div class = "table-right" style = "margin-right:5px; margin-top:20px;">
					<p><input type="text" name="adminuser"></p>
					<p><input type="password" name="apassword"></p>
					<p><input type="submit" name="adminaccess" value="Accedi"></p>
				</div>	
			</div>	
		</div>			
	</form>		
</body>
</html>