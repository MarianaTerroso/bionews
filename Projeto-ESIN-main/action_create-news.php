<?php
require_once('src/components/init.php');
require_once('src/news.php');
require_once('src/person.php');
require_once('src/adm.php');
require_once('src/tagnews.php');

$title = $_POST['title'];
$image = $_FILES['image'];
$summary = $_POST['summary'];
$content = $_POST['content'];
$date = date("Y/m/d");
$adm = getIdPersonByEmail($_SESSION['email']);
$tags = $_POST['tags'];

try {
  insertNews($date, $title, $content, $summary, $adm); 
  saveNewsPic($image, getLastIdNews());
  foreach ($tags as $tag) {
        insertTagNews($tag, getLastIdNews());
  }
  header('Location: index.php');
} catch (PDOException $e) {
  $err_msg = $e->getMessage();
  $_SESSION['msg'] = "Não foi possível criar notícia. Por favor, tente outra vez ($err_msg).";
  header('Location: create-news.php');
}