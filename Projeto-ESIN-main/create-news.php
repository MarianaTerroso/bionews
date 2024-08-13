<?php 
$title = 'Criar notícia';

require_once 'src/components/init.php';
require_once 'src/adm.php';
if(!isset($_SESSION["email"])){
  header('Location: index.php'); 
}
if(!(getAdmByEmail($_SESSION["email"]))){
  header('Location: index.php'); 
}
require_once 'src/components/layout_top.php';
require_once 'src/tagnews.php';
require_once 'src/news.php'; 

include('create-news_tpl.php');
require_once 'src/components/layout_bottom.php';
?>