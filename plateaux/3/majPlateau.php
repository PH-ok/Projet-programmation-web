<?php
	$jsonString = file_get_contents('jeu.json');
	$data = json_decode($jsonString,true);
	$carte = $_GET["carte"];
	$main = $_GET["main"];
	$cpt = 0;
	
	//retire la carte de la main du joueur si elle s'y trouve
	foreach($data as $i){
		$temp = [];
		foreach($i["cartes"] as $j){
			if ($j != $carte){
				$temp[]= $j;
			}
		}
		$data[$cpt]["cartes"] = $temp;
		$cpt = $cpt + 1;
	}
	
	//l'ajoute dans la main voulue
	$cpt = 0;
	foreach($data as $i){
		if($i["joueur"] == $main){
			$data[$cpt]["cartes"][]= intval($carte);
		}
		$cpt = $cpt + 1;
	}
	
	
	$json = json_encode($data);
	$bytes = file_put_contents("jeu.json", $json);
	echo $carte;
?>