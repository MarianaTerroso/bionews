<?php 
$title = 'Banimento'; 


require_once ('src/components/init.php'); 
if(isset($_SESSION["email"])){
    header('Location: index.php'); 
}
require_once ('src/components/layout_top.php'); 
$id = $_GET['id'];
require_once('banimento_tpl.php');
require_once('src/components/layout_bottom.php'); 
?>