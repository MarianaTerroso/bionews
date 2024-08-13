<?php
$title = 'Registo';

require_once ('src/components/init.php');
if(isset($_SESSION["email"])){
    header('Location: index.php');
}
require('src/person.php');
require('src/user.php');
require('src/adm.php');
require_once 'src/components/layout_top.php';
include('register_tpl.php');
require_once 'src/components/layout_bottom.php';
?>