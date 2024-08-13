<?php 
$title = 'BioNews';
require_once 'src/components/init.php';
require_once 'src/news.php';
require_once 'src/tagnews.php';
require_once 'src/components/layout_top.php';
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
if ($page < 1) {
    $page = 1;
}
$n_pages = ceil(getNumberofNews() / 6);
if ($page > $n_pages) {
    $pages = $n_pages;
}
include('index_tpl.php');
require_once 'src/components/layout_bottom.php'; ?>

