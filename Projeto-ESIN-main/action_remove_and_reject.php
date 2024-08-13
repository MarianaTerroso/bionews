<?php

require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/report.php'); 
require_once('src/appeal.php'); 
require_once('src/adm.php'); 
require_once('src/comments.php'); 
require_once('src/admappeal.php'); 
  $id = $_GET['id'];

  $appeals=getListAppeals();
  foreach ($appeals as $appeal) {
    if ($appeal['banishment'] == $id) {
      updateStatusofAppeal($appeal['banishment'],'rejected');
      $adm= getIdPersonByEmail($_SESSION['email']);
    }
  } 

  header('location: ' . $_SERVER['HTTP_REFERER']);
?>