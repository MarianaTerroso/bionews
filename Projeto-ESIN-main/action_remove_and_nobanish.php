<?php
  require_once('src/components/init.php');
  require_once('src/person.php');
  require_once('src/report.php'); 
  require_once('src/banishment.php'); 
  require_once('src/adm.php'); 
  require_once('src/comments.php'); 
  $id = $_GET['id'];
  $reports=getListReports();
  
  foreach ($reports as $report) { 
    if (getPersonIdByComment($report['comment']) == $id) {
      updateStatusofReport('analysed',$report['user'],$report['comment']);
    }
  } 

  header('location: ' . $_SERVER['HTTP_REFERER']);
?>

