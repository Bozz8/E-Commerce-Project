<?php
    include 'CIUIL.php';
    require_once 'functions.php';
    checkAllSet();

    $conn = new DBConn("UData");

    $query = "SELECT Username, Password, SALT FROM RegisterData WHERE ID = ?";
    $conn->doQP($query, $_SESSION['UID']);
    $conn->fetch();

	$PasswordDatabase =	$conn->get("Password");
	$HashedPassword = myHash($_POST["ConfermaPassword"], $conn->get("SALT"));
	
    if(! ($conn->get("Username") == $_POST["ConfermaUsername"] && $HashedPassword == $PasswordDatabase) )
        extB("Dati non corrispondenti!");

    $query = "DELETE FROM RegisterData WHERE ID = ?";
    $conn->doQP($query, $_SESSION['UID']);

    session_destroy();
    extRT("Account Eliminato con successo!", "index.php", 5000);
?>
