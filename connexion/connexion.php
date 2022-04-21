
<?php
// Ce fichier sert à décoder les mots de passe dans le fichier password.json et à vérifier la correspondance
	$jsonString = file_get_contents('Passwords.json');
	$data = json_decode($jsonString, true);
	$user = isset($_POST['pseudo']) ? $_POST['pseudo'] : NULL;;
	$pass = isset($_POST['mdp']) ? $_POST['mdp'] : NULL;;
	for($i=0; $i<sizeof($data); $i++){
			if ($user == $data[$i]["name"]){
				if($pass == password_verify($pass, $data[$i]["mdp"])){
					$validated = true;
				}
			}
	}
	//si la condition est validée on l'envoie vers la salle d'attente sinon on le renvoie à l'acceuil
    if(!$validated){
      header('Location:../index.php');
    }
    else{
      header('Location:salle_attente.php?id='.$user);
      exit();
    }
  ?>