<?php
session_start();
if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
    header('Location: test.php');
    else {
        extract($_GET);
        $id = strip_tags($id);

        require_once('functions.php');

        if(!empty($_POST))
        {
            extract($_POST);
            $errors = array();

            $author = strip_tags($author);
            $comment = strip_tags($comment);
            if(empty($author))
            {
                array_push($errors, 'Entrez un nom');
            }
            if(empty($comment))
            {
                array_push($errors, 'Entrez un commentaire');
            }
            if(count($errors) == 0)
            {
                $comment = addComment($id, $author,$comment);

                $success = '<div class="center"><p class="successPost">Votre formulaire a été publié !</p></div>';

                unset($author);
                unset($comment);
            }
        }

        $article = getArticles($id);
        $comments = getComments($id);
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
    <title><?= $article->title ?></title>
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
        <h1><?= $article->title ?></h1>
    </div>
    <div class="center">
        <div class="divBoxTextePostCol">
            <div class="dFlexName">
            <?php
                 $color = randomColor();
                 echo "<div class='cercleProfile' id='{$article->id}' style='background-color: $color'></div>";
             ?>
            <p><?= $article->nom ?></p>
            <time><?= $article->date ?></time>
            </div>
            <div>
                <p><?= $article->message ?></p>
            </div>
        </div>
    </div>
    

    <?php
    if(isset($success))
        echo $success;
    if(!empty($errors)):
    ?>

        <?php foreach($errors as $error): ?>
                <div class="center"><p class="errorPost"><?= $error ?></p></div>
        <?php endforeach; ?>

    <?php endif; ?>
    <div class="paddArticle"> 
            <h2>Ajouter un commentaire :</h2>
    <form action="article.php?id=<?= $article->id?>" method="post">
        <p><label for="author">Auteur:</label>
        <input class="insertInfo" type="text" name="author" id="author" value="<?= $_SESSION['psoeudo']?>"></p>
        <p><label for="comment">Commentaire:</label></p>
        <textarea class="insertInfo textArea" name="comment" id="comment" cols="30" rows="8"></textarea>
        <button class="containerBouton" type="submit">Envoyer</button>
    </form>

    <h2>Les commentaires :</h2>
    <?php foreach($comments as $com): ?>
        <div class="dFlexName">
            <h3><?=$com->author?></h3>
            <time><?=$com->date?></time>
        </div>
        <p><?=$com->comment?></p>
        <hr/>
    <?php endforeach; ?>
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