<?php 
require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/reactioncomment.php');

    $comment = $_GET["id"];
    $person = getIdPersonByEmail($_SESSION['email']);
    $type = 'like';
    deleteReactionComment($comment,$person,$type);
    header('location: ' . $_SERVER['HTTP_REFERER']);
?>