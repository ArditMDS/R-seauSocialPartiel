<?php 
require('connect.php');
// Check if the form has been submitted
if (isset($_POST["name"]) && isset($_POST["identifiant"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    // Retrieve the form data
    $name = $_POST["name"];
    $identifiant = $_POST["identifiant"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Insert the new user account into the database
    $stmt = $bdd->prepare("INSERT INTO connexion_page (psoeudo, identifiant,email, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name,$identifiant, $email, $password]);

    // Redirect to the login page
    header("Location: test.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienvenue sur S.W.O.A.T, inscrivez-vous pour accédez aux posts de tous les utilisateurs" />
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Sora:wght@500&display=swap" rel="stylesheet">
    <title>Page d'inscription</title>
</head>
<body>
    
</body>
</html>
<div class="containerConnexion">
    <form method="post">
    <div class="conteneurFormulaire">
            <div class="carreGauche">
                <img class="logoConnexion" src="./images/Logo texte.png">
                <h2>Bienvenue sur S.W.O.A.T.</h2>
                <p>Vous n'avez pas de compte ? Créez-en un gratuitement et simplement juste ici !</p>
            </div>
        <div class="connexionForm">
            <div class="connexionCarre">
                <div class="center"><p class="borderConnexion">Inscription</p></div>
                <hr/>
                <label for="name">Psoeudo:</label><br>
                <input class="insertInfo" type="text" id="name" name="name"><br>
                <label for="identifiant">Identifiant:</label><br>
                <input class="insertInfo" type="text" id="identifiant" name="identifiant"><br>
                <label for="email">Email:</label><br>
                <input class="insertInfo" type="text" id="email" name="email"><br>
                <label for="password">Password:</label><br>
                <input class="insertInfo" type="password" id="password" name="password"><br>
                <div class="centerSeConnecter">
                    <a href="test.php">J'ai déja un compte</a><br><br>
                    <input class="btnConnexion" type="submit" value="Create Account">
                </div>
            </div>
        </div>
</div>
    </form>
</div>

