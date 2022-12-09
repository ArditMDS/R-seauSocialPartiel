<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienvenue sur S.W.O.A.T, connectez vous pour accédez aux posts de tous les utilisateurs" />
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Sora:wght@500&display=swap" rel="stylesheet">
    <title>Page de connexion</title>
</head>
<body>
    
</body>
</html>
<div class="containerConnexion">
    <form method="POST">
        <div class="conteneurFormulaire">
            <div class="carreGauche">
                <img class="logoConnexion" src="./images/Logo texte.png">
                <h2>Bienvenue sur S.W.O.A.T.</h2>
                <p>Bienvenue sur le réseau le plus accessible d'internet, retrouvez ici tous vos proches ainsi que les créations de gens partout dans le monde !</p>
            </div>
            <div class="connexionForm">
                <div class="connexionCarre">
                    <div class="center"><p class="borderConnexion">Connexion</p></div>
                        <hr/>
                        Email: <br> <input class="insertInfo" type="text" name="email"><br>
                        Password: <br> <input class="insertInfo" type="password" name="password"><br>
                        <div class="centerSeConnecter">
                            <a href="inscription.php">Je n'ai pas de compte</a><br><br>
                            <?php
session_start();
require('connect.php');
if(isset($_POST['login']))
{
    if(!empty($_POST['email']) AND !empty($_POST['password']))
    {
        $email=$_POST["email"];
        $password=$_POST["password"];
        
        $recupUser = $bdd->prepare("SELECT * from `connexion_page` where email=? and password=?");
        $identifiant = $bdd->prepare("SELECT * from `connexion_page` where email=? and password=?");
        $id = $bdd->prepare("SELECT * from `connexion_page` where email=? and password=?");
        $recupUser->execute(array($email, $password));
        $identifiant->execute(array($email, $password));
        $id->execute(array($email, $password));

        if($recupUser->rowCount() > 0 && ($identifiant->rowCount()>0) && ($id->rowCount()>0))
        {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['psoeudo'] = $recupUser->fetch()['psoeudo'];
            $_SESSION['id'] = $id->fetch()['id'];
            $_SESSION['identifiant'] = $identifiant->fetch()['identifiant'];
            header('Location:page_reussi.php');
        } else {
            echo 'Votre mot de passe ou email est incorrect';
        }
    } else {
        echo 'Veuillez compléter tous les champs...';
    }
}


?>
                            <input class="btnConnexion" type="submit" name='login' value="Se connecter">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
