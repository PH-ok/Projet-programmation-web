<?php
  $jsonPoints = file_get_contents('points.json');
  $jsonCartes = file_get_contents('jeu.json');
  $jsonWaiting = file_get_contents("../../connexion/waiting.json");
  $jsonScores = file_get_contents('scores.json');
  $points = json_decode($jsonPoints,true);
  $cartes = json_decode($jsonCartes,true);
  $waitings = json_decode($jsonWaiting,true);
  $scores = json_decode($jsonScores,true);


  $nom = $_GET['name'];

  if($nom == $waitings[3]['joueurs'][0] || $nom == $waitings[0]['joueurs'][1]){// <- a changer lorsqu'on change de plateaux
    foreach ($cartes[4]['cartes'] as $carte) {
      foreach ($points as $value){
        if($value['id'] == $carte+1){
        $total = $scores[0]['total'];
        $scores[0]['total'] = $total + $value['NonAtout'];
        }
      }
    }
  }else{
    foreach ($cartes[4]['cartes'] as $carte) {
      foreach ($points as $value){
        if($value['id'] == $carte+1){
          $total2 = $scores[1]['total'];
          $scores[1]['total'] = $total2 + $value['NonAtout'];
        }
      }
    }
  }

  echo($scores[0]['total']);
  echo($scores[1]['total']);
  $cartes[4]['cartes'] = [];
  $json = json_encode($cartes);
  $bytes = file_put_contents("jeu.json", $json);
  $json2 = json_encode($scores);
  $bytes2 = file_put_contents("scores.json",$json2);
 ?>
