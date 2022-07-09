<?php
	session_start();
	include 'functions.php';
?>
<html>
	<head>
		<title></title>
	</head>
	<body>

	<?php
		error_reporting(0);
		checkAllSet();

		$connessione = new DBConn("UData");

		$regex = [		// regex per controllare la correttezza dei dati.
			0 => "/^[a-zA-Z0-9_-]{3,20}$/",
			1 => "/^[a-z ,.'-]+$/i",
			2 => "/^[a-z ,.'-]+$/i",
			3 => "/^[a-zA-Z0-9@.-_]{7,255}$/",
		];

		$_POST['date'] = str_replace('\\', '-', $_POST['date']);
		$_POST['date'] = str_replace('/', '-', $_POST['date']);
		$_POST['date'] = date("Y-m-d", strtotime($_POST['date']));

		// controllo preventivo sulla data
		if(!checkValidDate($_POST['date']))
			extB("Data non valida!");

		// controllo sulla mail
		if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
			extB("Email non valida!");

		$postVars = [ 	// variabili passate dall'utente.
			0 => $_POST['username'],
			1 => $_POST['name'],
			2 => $_POST['surname'],
			3 => $_POST['password'],
		];

		$flag = array();

		array_push($flag, checkCharValidity($regex[0],"username"));
		array_push($flag, checkCharValidity($regex[1],"name"));
		array_push($flag, checkCharValidity($regex[2],"surname"));
		array_push($flag, checkCharValidity($regex[3],"password"));
		if(!($_POST['gender'] == 0 || $_POST['gender'] ==1 ))
			extB("Sesso non contemplato");

		foreach($flag as $f)
			if(!$f)
				extBT("",5000);

		// controlli sull'username e sulla mail. (devono essere univoci).
		$query = "SELECT * FROM RegisterData WHERE lower(Username) = ? OR lower(Email) = ?";
		$connessione->doQP($query, array(strtolower($_POST['username']), strtolower($_POST['mail'])));
		if($connessione->getNumRows())
			extB("Username o Email già esistente");



		//controllo data
		if($postVars[3] > strtotime(date('Y-m-d'))) // se vieni dal futuro
			extB("Non puoi registrarti se vieni dal futuro!");

		$tStampNascita = strtotime(date('Y-m-d')) - strtotime($_POST['date']);  // secondi passati dalla nascita ad oggi
		$tStamp18 = strtotime(date('Y-m-d')) - strtotime(date('Y-m-d ') . "-18 year"); // secondi passati da oggi a 18 anni fa.
		if($tStampNascita <= $tStamp18) // se secondi passati dalla nascita < secondi passati da oggi a 18
			extB("Devi avere almeno 18 anni per registrarti");

		$tStamp123 = strtotime(date('Y-m-d')) - strtotime(date('Y-m-d ') . "-123 year"); // secondi passati da oggi a 123 anni fa.
		if($tStampNascita >= $tStamp123) // se vieni dal passato
			extB("Non puoi registrarti se vieni dal passato!");

		$salt = bin2hex(openssl_random_pseudo_bytes(128));
		$HashedPassword = myHash($_POST['password'], $salt);
		
		// inserimento dei dati nel database
		$query = "INSERT INTO RegisterData (Username,Name,Surname,Birth_Date,Email,Gender,Password,Reg_Date, SALT) VALUES (? , ? , ? , ? , ? , ? , ?, ?, ?)";
		$connessione->doQP($query, array($_POST['username'], $_POST['name'], $_POST['surname'], $_POST['date'], $_POST['mail'], $_POST['gender'], $HashedPassword, date('y-m-d H:i:s'), $salt));

		// non ci sono stati errori, i dati sono stati inseriti, disconnetto e reinderizzo.

		$connessione->close();

		$message = "<p style = 'text-align:center;'>Grazie per esserti registrato!
						<br>
						<a href = 'index.php'> Clicca qua </a> per tornare alla pagina principale o attendi il reindirizzamento al login
					</p>";
		extRT($message, "Login_Form.php", 5000);
	?>
	</body>
</html>
