<?php

require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/report.php'); 
require_once('src/appeal.php'); 
require_once('src/adm.php'); 
require_once('src/comments.php'); 
require_once('src/admappeal.php'); 
require_once('src/banishment.php'); 

$id = $_GET['id'];
$appeals = getListAppeals();

foreach ($appeals as $appeal) {
  if ($appeal['banishment'] == $id) {
    updateStatusofAppeal($appeal['banishment'], 'accepted');
    $adm = getIdPersonByEmail($_SESSION['email']);
    $end_date = date("Y/m/d");
    
    updateEnddateofBanishmentbyId($end_date, $id);

  }
}

header('location: ' . $_SERVER['HTTP_REFERER']);
?>
