<?php 
require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/save.php');

    $news = $_GET["id"];
    $person = getIdPersonByEmail($_SESSION['email']);
    deleteSave($news,$person);
    header('location: ' . $_SERVER['HTTP_REFERER']);
?>