<?php 
$title = 'Notícia';

require_once 'src/components/init.php';
require_once 'src/news.php';
require_once 'src/comments.php';
require_once 'src/tagnews.php';
require_once 'src/reactionnews.php';
require_once 'src/reactioncomment.php';
require_once 'src/save.php';
require_once 'src/person.php';
require_once 'src/adm.php';
require_once 'src/components/layout_top.php';
$id = $_GET['id'];
if (!getTitleNewsById($id)){
    header('location: index.php');
    die();
}
include('newspage_tpl.php');
require_once 'src/components/layout_bottom.php';
?>