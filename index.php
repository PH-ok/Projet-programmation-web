<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Jeu de Belotte</title>
        <link rel="stylesheet"  href="style.php">
        <link rel="icon" type="image/x-icon" href="image_profil2.ico">
        <meta name="author" content="hoel roquinarch">
    </head>
    <body>
        <h1>Belotte entre Kopins</h1>
        <br>
        <div class="connect">
        <h2>connexion</h2>
            <form action="connexion/connexion.php" method="post">
                <p>Identifiant</p>
                <input type="text" name="pseudo">
                <p>Mot de passe</p>
                <input type="password" name="mdp">
                <p>niveau :</p>
                Debutant<input type="radio" name="niv" value = "1"/>
                Joueur regulier<input type="radio" name="niv" value = "2"/>
                Expert<input type="radio" name="niv" value = "3"/>
                <p><input class = "conn" type="submit" value="Connexion"></p>
                <p>Premiere connexion ?</p>
                <a href="connexion/inscription.php"> <input class = "conn" type="button" value="Inscription"> </a>

        </div>
    </body>
