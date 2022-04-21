<?php

$f = json_decode(file_get_contents("jeu.json"),true);
		$salle = json_decode(file_get_contents("../../connexion/waiting.json"),true);
		$jsonScores = file_get_contents('scores.json');
		$scores = json_decode($jsonScores,true);
		$t = sizeof($salle[2]["joueurs"]);
		$j2 = null;
		$j3 = null;
		$j4 = null;
		$j1 = $salle[2]["joueurs"][0];
		if($t>=2){
			$j2 = $salle[2]["joueurs"][1];
		}
		if($t>=3){
			$j3 = $salle[2]["joueurs"][2];
		}
		if($t>=4){
			$j4 = $salle[2]["joueurs"][3];
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
		$scores[0]['total'] = 0;
		$scores[1]['total'] = 0;
		$json = json_encode($f);
		$bytes = file_put_contents("jeu.json", $json);
		$json2 = json_encode($scores);
		$bytes2 = file_put_contents("scores.json", $json2);

?>
