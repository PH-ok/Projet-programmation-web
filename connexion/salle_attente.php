<?php
	include ("functionAtt.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Jeu de Belotte</title>
        <link rel="stylesheet"  href="../style.php">
        <link rel="icon" type="image/x-icon" href="../image_profil2.ico">
        <meta name="author" content="hoel roquinarch">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
		
		
	
		<?php

			$name = $_REQUEST["id"];
			echo '<h2>Bonjour '.$name.'!!</h2><p id="bonjour"> Quelle table vous plairait le plus ?</p>';
			afficheAtt($name);

		?>
   
		
		<script type="text/javascript">
			//rafraichit la page toutes les 5 secondes
			$(document).ready(function () {
				setTimeout(function () {
				location.reload(true);
				}, 5000);
			});
			
		</script>
			
		<script>
			
		</script>
		
	</body>