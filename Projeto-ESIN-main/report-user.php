<?php 
$title = 'Denunciar';

require_once 'src/components/init.php';
if(!isset($_SESSION["email"])){
    header('Location: index.php');
}
require_once 'src/components/layout_top.php';
require_once 'src/report.php';
require_once 'src/comments.php';
$id = $_GET['id'];

include('report-user_tpl.php');
require_once 'src/components/layout_bottom.php';?>