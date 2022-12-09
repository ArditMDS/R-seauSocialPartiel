<?php
session_start();
require_once('functions.php');
$articles = getArticle();
$imagePosts = getImagePost();
$threadPosts = getThread();


if (isset($_POST['delete_column'])) {
    // Get the ID of the image post to delete
    $id = $_POST['id'];
  
    // Delete the image post
    supprImage($id);
  } 
if (isset($_POST['delete_message'])) {
    // Get the ID of the image post to delete
    $id = $_POST['id'];

    // Delete the image post
    supprTexte($id);
}
if (isset($_POST['delete_thread'])) {
    // Get the ID of the image post to delete
    $id = $_POST['id'];

    // Delete the image post
    supprThread($id);
} 
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sur cette page, retrouvez tout les posts réalisés par la communauté" />
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Sora:wght@500&display=swap" rel="stylesheet">
    <title>Accueil</title>
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
        <div class="phraseAccueil">
            <h1>Bienvenue sur S.W.O.A.T le réseau social le plus accessible qui existe !</h1>
           
        </div> <hr/ >
    <div class="containerTitrePosts">
        <h2 class="titrePosts" >Posts classiques</h2>
        <h2 class="titrePosts" >Posts images</h2>
        <h2 class="titrePosts" >Threads</h2>
    </div>
    
    <div class="containerAll">
        <div class="containerTexteSimple">
        <?php foreach($articles as $article): ?>
            <div class="divBoxTexte">
                <div class="containerHeaderPost">
                    <div class="center">
                        <?php
                             $color = randomColor();
                             echo "<div class='cercleProfile' id='{$article->id}' style='background-color: $color'></div>";
                            ?>
                        <p><?= $article->nom ?> @<?=$_SESSION['identifiant'] ?></p>
                    </div>
                    <time><?= $article->date ?></time>
                </div>
                <p><?= $article->message ?></p>
                <form action="" method="post">
                <div class="containerCommDel">
                <a href="article.php?id=<?= $article->id ?>">Voir les commentaires</a>

                    <input type="hidden" name="id" value="<?= $article->id?>">
                    <input type="submit" name="delete_message" value="" class="supprBtn">
                </div>
                </form>
            </div>
            <br>
        <?php endforeach; ?>
        </div>
        <div class="containerImagePost">
            <?php foreach($imagePosts as $imagePost): ?>
                <div class="divBoxTexte">
                <div class="containerHeaderPost">
                    <div class="center">
                        <?php
                             $color = randomColor();
                             echo "<div class='cercleProfile' id='{$article->id}' style='background-color: $color'></div>";
                            ?>
                        <p class="nameTag"><?= $imagePost->imageUrl ?> @<?=$_SESSION['identifiant'] ?></p>
                    </div>
                    <time class="timeSpan"><?= $imagePost->date ?></time>
                </div>
                    <img class="imageDesPosts" src="./images/<?= $imagePost->nom ?>">
                    <p><?= $imagePost->texte ?></p>
                        <form action="" method="post">
                        <a href="image.php?id=<?= $imagePost->id ?>">Voir les commentaires</a>
                            <input type="hidden" name="id" value="<?= $imagePost->id?>">
                            <div class="flex_end">
                                <input type="submit" name="delete_column" value="" class="supprBtn">
                            </div>
                        </form>
                </div>
                <br>
            <?php endforeach; ?>
        </div>
        <div class="containerThreadPost">
        <?php foreach($threadPosts as $threadPost): ?>
            <div class="divBoxTexte">
                    <div class="containerHeaderPost">
                        <div class="center">
                            <?php
                                $color = randomColor();
                                echo "<div class='cercleProfile' id='{$article->id}' style='background-color: $color'></div>";
                            ?>
                            <p><?= $threadPost->nom ?></p>
                            </div>
                        <time><?= $threadPost->date ?></time>
                    </div>
                <h2><?= $threadPost->title ?></h2>
                <p><?= $threadPost->message ?></p>
                <form action="" method="post">
                <a href="thread.php?id=<?= $threadPost->id ?>">Voir les commentaires</a>
                        <input type="hidden" name="id" value="<?= $threadPost->id?>">
                        <div class="flex_end">
                            <input type="submit" name="delete_thread" value="" class="supprBtn">
                        </div>
                </form>
            </div>
            <br>
        <?php endforeach; ?>
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