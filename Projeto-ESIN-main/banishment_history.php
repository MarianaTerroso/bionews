<?php 
$title = 'Histórico de Banimentos'; 

require_once 'src/components/init.php';
require_once 'src/adm.php';
if(!isset($_SESSION["email"])){
  header('Location: index.php'); 
}
if(!(getAdmByEmail($_SESSION["email"]))){
  header('Location: index.php'); 
}
require_once 'src/components/layout_top.php';
require_once 'src/banishment.php';


include('banishment_history_tpl.php');
require_once 'banishment_history_tpl.php';
require_once 'src/components/layout_bottom.php' 
?>