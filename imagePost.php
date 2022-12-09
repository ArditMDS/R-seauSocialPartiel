<?php
session_start();
require_once('functions.php');

        if(!empty($_POST))
        {
            if (isset($_FILES['image'])) {
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                move_uploaded_file($image_tmp, "./images/$image");
                $_SESSION['image-choisi'] = $image;
                
            } 
            extract($_POST);
            $errors = array();
            $userId = $_SESSION['id'];
            $imageUrl = $_SESSION['image-choisi'];
            $author = $_SESSION['psoeudo'];
            $description = $_POST['texte'];
            if (empty($imageUrl))
            {
                array_push($errors, ' Vous devez mettre une image ');
            }
            if(empty($author))
            {
                array_push($errors, ' Entrez un nom ');
            }
            if(empty($description))
            {
                array_push($errors, ' Entrez un message ');
            }
            if(count($errors) == 0)
            {
                $description = addImagePost($userId, $imageUrl, $author, $description);

                $success = '<p class="successMessage">Votre formulaire a été publié !</p>';

                unset($description);
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
    <title>Ajoutez un post image</title>
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
                <h1 class="titrePosts">Postez votre image préféré !</h1>
</div>
    <div class="centerError">
    <?php
        if(isset($success))
            echo $success;
        if(!empty($errors)):
    ?>
        <?php foreach($errors as $error): ?>
                <p class="errorMessage"><?= $error ?><br></p>
        <?php endforeach; ?>

    <?php endif; ?></div>
    <div class="centerImage">
        <div class="divBoxTextePost">
            <form  method="post" enctype="multipart/form-data">
                <p><label for="auteur">Auteur:</label>
                <input class="insertInfo" type="text" name="author" id="author" value="<?= $_SESSION['psoeudo']?>"></p>

                <label for="image">Choisir une image:</label>
                <input type="file" name="image" id="image">

                <p><label for="texte">Description:</label></p>
                <textarea class="textArea insertInfo" name="texte" id="texte" cols="30" rows="8"></textarea>

                <div class="center">
                    <button class="containerBouton" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
        <div class="containerImage"><img class='tailleMaxImage' src='./images/<?= $_SESSION['image-choisi']?>'></div>
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