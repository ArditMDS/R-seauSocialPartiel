<?php
session_start();
require_once('functions.php');

        if(!empty($_POST))
        {
            extract($_POST);
            $errors = array();
            $userId = $_SESSION['id'];
            $title = $_POST['title'];
            $author = $_SESSION['psoeudo'];
            $message = $_POST['message'];
            if (empty($title))
            {
                array_push($errors, 'Vous devez mettre un titre');
            }
            if(empty($author))
            {
                array_push($errors, 'Entrez un nom');
            }
            if(empty($message))
            {
                array_push($errors, 'Entrez un message');
            }
            if(count($errors) == 0)
            {
                $message = addThread($userId, $title,$author,$message);

                $success = '<p class="successMessage">Votre formulaire a été publié !</p>';

                unset($title);
                unset($message);
            }
            
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Sora:wght@500&display=swap" rel="stylesheet">
    <title>Postez un thread</title>
</head>
<body>
<nav>
        <ul class="navUl">
            <li class="navLi"><img class="logo" src="./images/Logo texte.png" alt=""></li>
            <div class="barreEntreNav"></div>
            <li class="navLi"><a href="page_reussi.php">Accueil</a></li>
            <div class="barreEntreNav"></div>
            <li class="navLi"><a href="choisirPost.php">Nouveau Post</a><img class="logoAddPost" src="./images/addpost.png"></li>
            <div class="barreEntreNav"></div>
            <li class="navLi"><a href="test.php">Deconnexion</a></li>
            <div class="barreEntreNav"></div>
            <li class="navLi"><a href=""><img src="./images/page compte.png" alt=""><p class="idNav"><strong>@<?=$_SESSION['identifiant'] ?></strong></p></a></li>
        </ul>
    </nav>
<div class="center">
    <h1 class="titrePosts">Postez un thread incroyable !</h1>
</div>
<div class="centerError">
<?php
    if(isset($success))
        echo $success;
    if(!empty($errors)):
    ?>

        <?php foreach($errors as $error): ?>
                <p class="errorMessage"><?= $error ?></p>
        <?php endforeach; ?>

<?php endif; ?>
</div>
<div class="center">
    <div class="divBoxTextePost">
        <form  method="post" >

            <p><label for="auteur">Auteur:</label>
            <input class="insertInfo" type="text" name="author" id="author" value="<?= $_SESSION['psoeudo']?>"></p>

            <p><label for="title">Sujet:</label>
            <input class="insertInfo" type="text" name="title" id="title"></p>

            <p><label for="message">Message:</label></p>
            <textarea class="insertInfo textArea" name="message" id="message" cols="30" rows="8"></textarea>
            <div class="center">
                <button class="containerBouton" type="submit">Envoyer</button>
            </div>
        </form>
    </div>
</div>
<footer>
        <ul class="navFooter navUl">
            <il class="navLi">RGPD</il>
            <il class="navLi">Conditions générales d'utilisations</il>
            <il class="navLi">S'inscrire</il>
            <il class="navLi">Se connecter</il>
            <il class="navLi">Politiques de confidentialités</il>
            <il class="navLi">Nouveau Post</il>
        </ul>
        <div class="footerLogoCopy">
            <div class="logoBarre">
                <img class='petitLogo' src="./images/logo simple.png" alt="">
            </div>
            <div class="copyright">
                S.W.O.A.T 2022
            </div>
        </div>
    </footer>
</body>
</html>