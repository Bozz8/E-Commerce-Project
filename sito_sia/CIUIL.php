<?php
	session_start();
	include 'functions.php';

	if(!isset($_SESSION["loginStatus"]))	{	
		$message = "<p style = 'text-align:center;'>Devi essere registrato ed aver effettuato l'accesso per continuare.
						<br>
						<a href = 'Register_Form.html'> Clicca qua </a> per registrarti o attendi il reindirizzamento alla pagina precedente.
					</p>";
		extBT($message,5000);
	}	
	
	if(strcmp($_SESSION["loginStatus"], "logged"))	{
		$message = "<p style = 'text-align:center;'>
						Devi aver effettuato l'accesso come utente per accedere a questa sezione.
					</p>";
		extBT($message,1500);
	}
?>