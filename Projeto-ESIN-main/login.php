<?php
$title = 'Entrar';

require('src/components/init.php');
if(isset($_SESSION["email"])){
    header('Location: index.php');
}
require('src/person.php');
require_once 'src/components/layout_top.php';
include('login_tpl.php');
require_once 'src/components/layout_bottom.php';
?>