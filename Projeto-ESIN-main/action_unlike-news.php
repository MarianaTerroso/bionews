<?php 
require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/reactionnews.php');

    $news = $_GET["id"];
    $person = getIdPersonByEmail($_SESSION['email']);
    $type = 'like';
    deleteReactionNews($news,$person,$type);
    header('location: ' . $_SERVER['HTTP_REFERER']);
?>