<?php
    include 'CIUIL.php';
?>

<html>
    <head>
    	<title>EStore</title>
    	<?php
    		include 'links.html';
    	?>
    </head>
    <body>
        <div id="mainwrapper" class="flexCol FSize center" style = "background: none repeat scroll 0 0 #f4f4f4;">
    		<?php
    			include 'header.html';
    		?>
            <p class = "FlexRow center" style = "width: 100%; font-size: 1.5em; margin-top: 10px; font-weight: bold;"> Eliminazione account </p>
            <div class = "flexCol FSize hcenter">
                <p> Stai per eliminare il tuo account. </p>
                <p> Scrivi il tuo username e la tua password per confermare. </p>
                <p> Questa azione non puo' essere annullata! </p>
                <form action = "RimozioneAccount.php" method = "POST" class = "flexCol center">
                    <div class = "flexRow center">
                        <div class = "flexCol center">
                            <p class = "flexRow center" style = "height: 25px;"> Username: </p>
                            <p class = "flexRow center" style = "height: 25px;"> Password: </p>
                        </div>
                        <div class = "flexCol center">
                            <p class = "flexRow center" style = "height: 25px;"><input type = "text" name = "ConfermaUsername"></p>
                            <p class = "flexRow center" style = "height: 25px;"><input type = "password" name = "ConfermaPassword"></p>
                        </div>
                    </div>
                    <input type = "submit" value = "Elimina!">
                </form>
            </div>
        </div>
    </body>
</html>
