<?php 
require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/reactionnews.php');

if (isset($_SESSION["email"])) {
    $news = $_GET ['id'];
    $person = getIdPersonByEmail($_SESSION['email']);
    $type = 'like';
    deleteAnyReactionNews($news,$person);
    insertReactionNews($news,$person,$type);
    header('location: ' . $_SERVER['HTTP_REFERER']);
}else {
    header ('Location: login.php');
}
?>