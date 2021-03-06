<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Jeu de Belotte</title>
        <link rel="stylesheet"  href="../style.php">
        <link rel="icon" type="image/x-icon" href="../image_profil2.ico">
        <meta name="author" content="hoel roquinarch">
    </head>
    <body>
    <?php
// define variables and set to empty values
$nameErr = $mdpErr = $genderErr = "";
$name = $mdp = $gender = "";

//Affiche une erreur si il n'y a pas de valeur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "un nom est requis";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["mdp"])) {
    $mdpErr = "un mot de passe est requis";
  } else {
    $mdp = test_input($_POST["mdp"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
        <h1>Belotte entre boufz</h1>
        <br>
        <div class="connect">
            <a href="../index.php" > <input class = "retour" type="button" value="Retour"> </a>
            <h2>Inscription</h2>
                <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
                    <p>Identifiant</p>
                    <input type="text" name="name">
                    <span class="error">* <?php echo $nameErr;?></span>
                    <p>Mot de passe</p>
                    <input type="password" name="mdp">
                    <span class="error">* <?php echo $mdpErr;?></span>
                    <br><br>
                    <p><input class = "conn" type="submit" value="S'inscrire"></p>
        </div>

	<?php
	//fonction d'encodage du mot de passe
		if($name!=="" && $mdp!==""){
			$jsonString = file_get_contents('Passwords.json');
			$data = json_decode($jsonString, true);

			// data strored in array
				$array = Array (
					"name" => $name,
					"mdp"=> password_hash($mdp, PASSWORD_DEFAULT),
				);

			$data[]=$array;
			//encode array to json
			$json = json_encode($data);
			$bytes = file_put_contents("Passwords.json", $json);
		}
	?>
    </body>
