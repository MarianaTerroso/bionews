<?php
require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/reactioncomment.php');

if (isset($_SESSION["email"])) {
    $comment = $_GET["id"];
    $person = getIdPersonByEmail($_SESSION['email']);
    $type = 'like';
    deleteAnyReactionComment($comment, $person);
    insertReactionComment($comment, $person, $type);
    header('location: ' . $_SERVER['HTTP_REFERER']);
}else {
    header ('Location: login.php');
}