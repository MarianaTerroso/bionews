<?php 
$title = 'Apelos';

require_once 'src/components/init.php';
require_once 'src/adm.php';
if(!isset($_SESSION["email"])){
  header('Location: index.php'); 
}
if(!(getAdmByEmail($_SESSION["email"]))){
  header('Location: index.php'); 
}
require_once 'src/appeal.php';
require_once 'src/components/layout_top.php'; 

include('list_appeals_tpl.php');
require_once 'src/components/layout_bottom.php';
?>