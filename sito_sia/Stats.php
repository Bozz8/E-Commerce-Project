<?php
     include 'checkifadmin.php';
     $connessione = new DBConn("UData");
     $query = "	SELECT * FROM Ricevuta WHERE Data_Ordine > STR_TO_DATE(? , '%d/%m/%Y')";
     $connessione->doQP($query,date("d/m/Y",strtotime(date('Y/m/d') . "-1 month")));
?>

<html>
<head>
	<title> Statistiche</title>
</head>
<body>	
		Numero di ordini dell'ultimo mese:
		<?=$connessione->getNumRows()?>
		<br>
		Guadagno netto:
		<?php
			$guadagno = 0;
			while($connessione->fetch())
				$guadagno += $connessione->get('Prezzo');
			echo $guadagno;
		?>
</body>
</html>