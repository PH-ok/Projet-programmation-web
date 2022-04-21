<?php
//Cette fonction renvoie un string avec le 5 dernier messages envoyées pour les affichés
  $jsonString = file_get_contents('chat.json');
  $data = json_decode($jsonString,true);
  $res = [];
  foreach ($data as $i) {
    $array = array(
      "nom" =>  $i["joueur"],
      "msg" => $i["msg"],
    );
    $res[] = $array;
  }
  $string = json_encode($res);
  echo $string;
?>
