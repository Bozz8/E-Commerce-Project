<html>
	<body>
			<?php
				session_start();
				include 'functions.php';
				
				checkAllSet();
				$connessione = new DBConn("UData");
				
				$username = strtolower($_POST['username']);
				$query = "SELECT * FROM RegisterData WHERE lower(username) = ? OR lower(email) = ?"; // username, username
				$connessione->doQP($query, array($username, $username));
				
				if(!$connessione->getNumRows()) // se la query non ha trovato risultati...
					extB("Username o Email non esistente");
				
				$connessione->fetch();
				
				$HashedPassword = myHash($_POST['password'], $connessione->get("SALT"));
				
				if($connessione->get("Password") != $HashedPassword) // se la password non corrisponde...
					extB("Password errata", "index.php");
				
				$connessione->close();
				
				if(!isset($_SESSION["loginStatus"]))
				{
					$_SESSION["nome"] = $connessione->get("Name");
					$_SESSION["cognome"] = $connessione->get("Surname");
					$_SESSION["UID"] = $connessione->get("ID");
					$_SESSION["Mail"] = $connessione->get("Email");
					$_SESSION["loginStatus"] = "logged";
				}
				echo"	<div style = 'text-align: center'> 
							Benvenuto {$connessione->get("Name")}.<br> Stai per essere reindirizzato alla tua area riservata.
						</div>";
				extR("","myaccount.php");

			?>
	</body>
</html>