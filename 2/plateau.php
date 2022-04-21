
<?php
	include ("function.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Jeu de Belotte</title>
        <link rel="stylesheet"  href="../../style.php">
        <link rel="icon" type="image/x-icon" href="../image_profil2.ico">
        <meta name="author" content="hoel roquinarch">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src = "chat.js"></script>
		<script src = "game.js"></script>
    </head>

	<script>
		//fonctions gérant le "drag and drop"
        function start(e){
          e.dataTransfer.effectAllowed="move";
          e.dataTransfer.setData("text",e.target.getAttribute("id"));
        }
        function over(e){
          e.currentTarget.className="playable";
          return false;
        }
        function drop(e){
          ob=e.dataTransfer.getData("text");
          e.currentTarget.appendChild(document.getElementById(ob));
          e.currentTarget.className="playable";
          e.stopPropagation();
		  let carte = document.getElementById(ob).id;
		  console.log(carte);
		  let main = e.currentTarget.id;
		  console.log(main);
		  $.ajax({
			method: "GET",
			url: "majPlateau.php",
			data:{"carte" : carte-1, "main" : main}
		  }).done(function(e) {
				console.log(e);
			}).fail(function(e) {
				console.log("prout");
			});
		  window.location.reload(true);
          return false;
        }
        function leave(e){
          e.currentTarget.className="playable"
        }

    </script>

    <body>
		<script>
			//script affichant le chat
			afficheChat();
		</script>


		<?php
			//corps de la page
				$nom = $_POST["nom"];
				echo '<form action = "plateau.php" method="post">';
				echo '<input type="hidden" value="'.$nom.'" name="nom">';
			    echo '<input type="submit" value="nouvelle partie" onclick="newGame();"></input>';
				echo '</form>';


				echo '<form action = "../../connexion/salle_attente.php?id='.$nom.'">';
			    echo '<button type="submit" name="id" value="'.$nom.'">quitter</button>';
				echo '</form>';

				//nouvellePartie();
				//fonction affichant l'état du jeu
				affichePartie('jeu.json','../cartes.json',$nom);
		?>


		<!--<div id="tapis" class="playable" ondragstart="start(event)" ondragover="return over(event)" ondrop="return drop(event)"
          onDragLeave="leave(event)">
		</div>-->


		<?php
		//boutons de rammassage de pli
		$lejoueur = "'$nom'";
		echo '<input type="button" id="clearTapis" value="Ramasser le pli" onclick="pointPli('.$lejoueur.');$(\'#tAP15\').empty()"></input>';
		?>
		<div>
			<?php
			$json = file_get_contents('scores.json');
			$scores = json_decode($json,true);
			echo 'Score de l\'équipe 1:'.$scores[0]['total'].'<br>
			Score de l\'équipe 2 : '.$scores[1]['total'].'';
			?>
		</div>
		
		<!--chat-->
		<div id="boite">
			<p id="msg">

			</p>
		<?php
			echo '<form>
			<input type="text" id="chat"></input>
				<input type="button" value="envoyer" onclick="ecrireChat(\''.$nom.'\');afficheChat();document.getElementById(\'chat\').value = \'\'""></input>
			</form>';
		?>
		</div>

		<script type="text/javascript">
		//script réinitialisant la page toutes les 5 secondes
			$(document).ready(function () {
				setTimeout(function () {
				location.reload(true);
			}, 5000);
			});
		</script>

    </body>
