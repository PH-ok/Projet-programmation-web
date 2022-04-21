<?php
	//Cette fonction sert à afficher les joueur dans les différentes salles
	function afficheAtt($id){
		$jsonString = file_get_contents('waiting.json');
		$data = json_decode($jsonString,true);
		$cpt = 0;
		foreach($data as $i){
			$cpt = $cpt + 1;
			echo '<div class = "table">';
			echo "<h3>".$i['nom']."</h3>";
			echo "<h4>joueurs</h4>";
			print('<table class="liste" id="'.$i['nom'].'">');
			foreach($i["joueurs"] as $j){
				print("<tr><td>".$j."</td></tr>");
			}
			print("</table>");
			echo '<form action="../plateaux/'.$cpt.'/acceuil.php" method="post">';
			echo '<input type = "hidden" name = "nom" value = "'.$id.'"></input>';
			echo '<input class = "join" type="submit" value="Rejoindre">';
			echo '</form>';
			echo "</div>";
		}
	}
	
	
?>
