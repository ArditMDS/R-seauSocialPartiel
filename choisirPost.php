<?php session_start();
require("functions.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Sora:wght@500&display=swap" rel="stylesheet">
    <title>Choississez un post</title>
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
    <ul class="choisirPost choixUl">
        <li class="listChoisirPostTaille"><a  class="listChoisirPost" href="ajouterPost.php">Un message un post</a></li>
        <li class="listChoisirPostTaille"><a class="listChoisirPost" href="imagePost.php">Une image post</a></li>
        <li class="listChoisirPostTaille"><a class="listChoisirPost" href="threadPost.php">Un thread post</a></li>
    </ul>
    <ul class="listChoix choixUl">
        <li class="boxChoixPost">
            <a class="listChoisirPost2" href="ajouterPost.php">
                <?php
                    $color = randomColor();
                    echo "<div class='cercleProfile marg' id='{boule}' style='background-color: $color'></div>";
                ?>
                <h2>Racontez ce que vous voulez !</h2>
            </a>
        </li>
        <li class="boxChoixPost">
            <a class="listChoisirPost2" href="imagePost.php">
                <?php
                    $color = randomColor();
                    echo "<div class='cercleProfile marg' id='{boule}' style='background-color: $color'></div>";
                ?>
                <h2>Montrez au monde vos plus belles photos</h2>
                <div class="imageChoixPost"><img src="./images/logo simple.png"></div>
            </a>
        </li>
        <li class="boxChoixPost">
            <a class="listChoisirPost2" href="threadPost.php">
                <?php
                    $color = randomColor();
                    echo "<div class='cercleProfile marg' id='{boule}' style='background-color: $color'></div>";
                ?>
                <h2>Discutez de n'importe quel sujet !</h2>
            </a>
        </li>
    </ul>
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