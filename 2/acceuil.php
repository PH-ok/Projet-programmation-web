<!DOCTYPE html>
<html>
  <head>
  	<title>Submit a form using JavaScript onclick event</title>
  </head>
  <body>
<?php
				$nom = $_POST["nom"];
	//gestion de la file d'attente
				$jsonString = file_get_contents('../../connexion/waiting.json');
				$data = json_decode($jsonString,true);
				
				$cpt = 0;
				//retire le joueur d'une salle si il s'y trouve déjà
				foreach($data as $i){
					$temp = [];
					foreach($i["joueurs"] as $j){
						if ($j != $nom && $j != null){
							$temp[]= $j;
						}
					}
					$data[$cpt]["joueurs"] = $temp;
					$cpt = $cpt + 1;
				}

				//l'ajoute dans la salle voulue
				$cpt = 0;
				foreach($data as $i){
					if ($i["nom"]=="plateau 2"){ // <- a changer lorsqu'on change de plateaux
						$data[$cpt]["joueurs"][]= $nom;
					}
					$cpt = $cpt + 1;
				}


				$json = json_encode($data);
				$bytes = file_put_contents("../../connexion/waiting.json", $json);
				

				echo '<form action = "plateau.php" method="post" id="my_form">';
				echo '<input type="hidden" value="'.$nom.'" name="nom">';
				echo '</form>';
			
?>
		<script type="text/javascript">	
		//renvoie le formulaire afin de passer le nom par méthode POST
			var form = document.getElementById("my_form");
			form.submit();
		</script>