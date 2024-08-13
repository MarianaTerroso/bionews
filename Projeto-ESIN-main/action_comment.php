<?php
  require_once('src/components/init.php');
  require_once('src/person.php');
  require_once('src/comments.php');

    if (isset($_SESSION["email"])){
     $date = date("Y/m/d");
     $text = $_POST['comment'];
     $news = $_GET ['id'];
     $person = getIdPersonByEmail($_SESSION['email']);
     insertComment($date,$text,$news,$person);
     header('location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
        header ('Location: login.php');
    }
    
?>