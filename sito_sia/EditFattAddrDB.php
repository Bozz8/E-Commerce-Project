<meta charset="utf-8"/>
<?php
	include 'CIUIL.php';
	setlocale(LC_ALL,"it_IT");
	checkSet(array("Destinatario","Indirizzo1","Citta","Provincia","CAP","Paese"));
	$connessione = new DBConn("UData");

	$flag = array();

	array_push($flag, checkCharValidity("/^[A-Za-zàèéìòóù.\- ]+$/i","Destinatario"));
	array_push($flag, checkCharValidity("#^[A-Za-zàèéìòóù,0-9-/\.\- ]+$#i","Indirizzo1"));
	if(!empty($_POST['Indirizzo2']))
		array_push($flag, checkCharValidity("#^[A-Za-zàèéìòóù,0-9-/\.\- ]+$#i","Indirizzo2"));
	array_push($flag, checkCharValidity("/^[A-Za-zàèéìòóù]+$/i","Citta"));
	array_push($flag, checkCharValidity("/^[A-Z]{2}+$/i","Provincia"));
	array_push($flag, checkCharValidity("/^[0-9]{5}+$/i","CAP"));
	if(!empty($_POST['PIVA']))
		array_push($flag, checkCharValidity("/^[0-9]{11}+$/i","PIVA"));
	

	foreach($flag as $f)
		if(!$f)
			extBT("",5000);
	

	$query ="	UPDATE Indirizzo_Fatturazione
				SET Name_Surname=?,Address_1=?,Address_2=?,City=?,Province=?,CAP=?,Paese=?,PartitaIVA=?
				WHERE IDBilling = ?";
	$parametri = array($_POST['Destinatario'],$_POST['Indirizzo1'],$_POST['Indirizzo2'],$_POST['Citta'],$_POST['Provincia'],$_POST['CAP'],$_POST['Paese'],$_POST['PIVA'], $_POST['ID']);

	$connessione->doQP($query,$parametri);
	extRT("Indirizzo di fatturazione aggiornato con successo", "myaccount.php", 5000);		

?>
