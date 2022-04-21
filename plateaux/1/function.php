<?php
	//fonction test
	function afficheCarte($nomdujson){
		$f = json_decode(file_get_contents($nomdujson),true);
		for($i=0; $i<sizeof($f); $i++)
			print( "<img class=\"carte\" src=\"".$f[$i]['image']."\"></img>");

	}

	//Fonction reportée dans un php a part pour un appel js
	/**
	function nouvellePartie(){
		$f = json_decode(file_get_contents("jeu.json"),true);
		$salle = json_decode(file_get_contents("../../connexion/waiting.json"),true);
		$t = sizeof($salle[0]["joueurs"]);
		$j2 = null;
		$j3 = null;
		$j4 = null;
		$j1 = $salle[0]["joueurs"][0];
		if($t>=2){
			$j2 = $salle[0]["joueurs"][1];
		}
		if($t>=3){
			$j3 = $salle[0]["joueurs"][2];
		}
		if($t>=4){
			$j4 = $salle[0]["joueurs"][3];
		}

		$numbers = range(1,32);
		shuffle($numbers);
		$f = array(
				array(
					"joueur" => $j1,
					"cartes" => array(
						$numbers[0],
						$numbers[1],
						$numbers[2],
						$numbers[3],
						$numbers[4],
						$numbers[5],
						$numbers[6],
						$numbers[7]
						)
					),array(
					"joueur" => $j2,
					"cartes" => array(
						$numbers[8],
						$numbers[9],
						$numbers[10],
						$numbers[11],
						$numbers[12],
						$numbers[13],
						$numbers[14],
						$numbers[15]
						)
					),array(
					"joueur" => $j3,
					"cartes" => array(
						$numbers[16],
						$numbers[17],
						$numbers[18],
						$numbers[19],
						$numbers[20],
						$numbers[21],
						$numbers[22],
						$numbers[23]
						)
					),array(
					"joueur" => $j4,
					"cartes" => array(
						$numbers[24],
						$numbers[25],
						$numbers[26],
						$numbers[27],
						$numbers[28],
						$numbers[29],
						$numbers[30],
						$numbers[31]
						)
					),array(
					"joueur" => "tAP15",
					"cartes" => array(
						)
					)

				);
		$json = json_encode($f);
		$bytes = file_put_contents("jeu.json", $json);

	}**/

	//Fonction d'affichage de la partie elle est executée à chaque chargement de la page plateau
	function affichePartie($nomdujson,$json2,$nom){
		$f = json_decode(file_get_contents($nomdujson),true);
		$cartes = json_decode(file_get_contents($json2),true);
		$ally = 0;
		for($i=0; $i<sizeof($f); $i++){
			if($f[$i]['joueur'] == $nom){
				if($i == 0|| $i == 2){
					$ally = $i + 1;
				}
				else{
					$ally = $i - 1;
				}
			}
		}
		$cpt = 2;
		for($i=0; $i<sizeof($f); $i++){
			if($f[$i]['joueur'] == $nom){
				print( "<div id='".$f[$i]["joueur"]."' class=\"playable joueur1\" ondragstart=\"start(event)\" ondragover=\"return over(event)\" ondrop=\"return drop(event)\" onDragLeave=\"leave(event)\">");
				foreach($f[$i]['cartes'] as $carte){
					print( "<img class=\"carte\" src=\"".$cartes[$carte]['image']."\" id=\"".$cartes[$carte]['id']."\"></img>");					}
				}
			else if($f[$i]['joueur'] == 'tAP15'){
				print( "<div id='".$f[$i]["joueur"]."' class=\"playable tapis\" ondragstart=\"start(event)\" ondragover=\"return over(event)\" ondrop=\"return drop(event)\" onDragLeave=\"leave(event)\">");
				foreach($f[$i]['cartes'] as $carte){
					print( "<img class=\"carte\" src=\"".$cartes[$carte]['image']."\" id=\"".$cartes[$carte]['id']."\"></img>");
				}
			}
			else if($i == $ally){
				print( "<div id='".$f[$i]["joueur"]."' class=\"joueur3\" >");
				foreach($f[$i]['cartes'] as $carte){
					print( "<img class=\"carte\" src=\"".$cartes[0]['image']."\" id=\"".$cartes[$carte]['id']."\"></img>");
				}
			}
			else{
				print( "<div id='".$f[$i]["joueur"]."' class=\"joueur".$cpt."\" >");
				foreach($f[$i]['cartes'] as $carte){
					print( "<img class=\"carte\" src=\"".$cartes[0]['image']."\" id=\"".$cartes[$carte]['id']."\"></img>");
				}
				$cpt = $cpt+2;
			}
			print ("</div>");
		}
	}

?>
