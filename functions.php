<?php
function getArticle()
{
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM message_post ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function getImagePost()
{
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM image_post ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function getThread(){
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM thread_post ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function getArticles($id)
{
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM message_post WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount()==1)
    {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else 
        header('Location: test.php');
        $req->closeCursor();
}
function getImages($id)
{
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM image_post WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount()==1)
    {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else 
        header('Location: test.php');
        $req->closeCursor();
}
function getCommThread($id)
{
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM thread_post WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount()==1)
    {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else 
        header('Location: test.php');
        $req->closeCursor();
}
function addArticle($userId, $title, $author, $message)
{
    require('connect.php');
    $req = $bdd->prepare('INSERT INTO message_post (userId, title, nom, message, date) VALUES(?, ?, ?, ?,NOW())');
    $req->execute(array($userId , $title, $author, $message));
    $req->closeCursor();

}
function addThread($userId, $title, $author, $message)
{
    require('connect.php');
    $req = $bdd->prepare('INSERT INTO thread_post (userId, title, nom, message, date) VALUES(?, ?, ?, ?,NOW())');
    $req->execute(array($userId , $title, $author, $message));
    $req->closeCursor();

}
function addImagePost($userId, $author, $imageUrl, $description)
{
    require('connect.php');
    $req = $bdd->prepare('INSERT INTO image_post (userId, nom,imageUrl, texte, date) VALUES(?,?, ?, ?,NOW())');
    $req->execute(array($userId , $author, $imageUrl, $description));
    $req->closeCursor();
}
function addComment($articleId, $author,$comment) 
{
    require('connect.php');
    $req = $bdd->prepare('INSERT INTO commentaire_post (articleId, author, comment, date) VALUES(?,?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}
function addCommentImage($imageId, $author, $comment) {
    require('connect.php');
    $req = $bdd->prepare('INSERT INTO commimage_post (imageId, author, comment, date) VALUES(?,?, ?, NOW())');
    $req->execute(array($imageId, $author, $comment));
    $req->closeCursor();
}
function addCommentThread($threadId, $author, $comment)
{
    require('connect.php');
    $req = $bdd->prepare('INSERT INTO commthread_post (threadId, author, comment, date) VALUES(?,?, ?, NOW())');
    $req->execute(array($threadId, $author, $comment));
    $req->closeCursor();
}
function getComments($id) 
{
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM commentaire_post WHERE articleId = ?  ORDER BY id desc');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function getCommentsImage($id)
{
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM commimage_post WHERE imageId = ?  ORDER BY id desc');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function getCommentsThread($id)
{
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM commthread_post WHERE threadId = ?  ORDER BY id desc');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function supprImage($id)
{
    require('connect.php');
    $req = $bdd->prepare("DELETE FROM image_post WHERE id = $id");
    $req->execute(array($id));
    $req->closeCursor();
}
function supprTexte($id)
{
    require('connect.php');
    $req = $bdd->prepare("DELETE FROM message_post WHERE id = $id");
    $req->execute(array($id));
    $req->closeCursor();
}
function supprThread($id)
{
    require('connect.php');
    $req = $bdd->prepare("DELETE FROM thread_post WHERE id = $id");
    $req->execute(array($id));
    $req->closeCursor();
}
function randomColor() {
    $colors = array("red", "green", "blue", "yellow", "orange", "purple", "pink", "teal");
    $randomIndex = rand(0, count($colors)-1);
    return $colors[$randomIndex];
  }
?>