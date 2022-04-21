<?php
  $jsonString = file_get_contents('chat.json');
  $data = json_decode($jsonString,true);
  $nom = $_GET["nom"];
  $message = $_GET["message"];
  
  $temp=[];
  //verification si il y'a + de 5 messages
  if (sizeof($data)>= 5){
	  for($i=1; $i<=4; $i++){
		  $temp[]=$data[$i];
	  }
  }
  else{
	  $temp = $data;
  }
  //ajout du message
  $array = array(
    "joueur" => $nom,
    "msg" => $message
	);
  $temp[] = $array;
  $string = json_encode($temp);
  $ui = file_put_contents("chat.json",$string);
  ?>
