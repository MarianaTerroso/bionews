<?php 
$title = 'Perfil';

require_once 'src/components/init.php';
if(!isset($_SESSION["email"])){
    header('Location: index.php');
}
require_once 'src/components/layout_top.php';
require_once 'src/person.php'; 
require('profile_tpl.php');
require_once 'src/components/layout_bottom.php'; ?>