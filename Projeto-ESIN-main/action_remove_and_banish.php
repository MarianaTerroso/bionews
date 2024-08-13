<?php
  require_once('src/components/init.php');
  require_once('src/person.php');
  require_once('src/report.php'); 
  require_once('src/banishment.php'); 
  require_once('src/adm.php'); 
  require_once('src/comments.php'); 

$id = $_GET['id'];

$reports = getListReports();
foreach ($reports as $report) {
  if (getPersonIdByComment($report['comment']) == $id) {
    updateStatusofReport('analysed',$report['user'],$report['comment']);
    deleteComment($report['comment']);
  }
}

$end_date = $_POST['end_date'];
$start_date = date("Y/m/d");
$user = $id;
$adm = getIdPersonByEmail($_SESSION['email']);
$status = 'analysed';

try {
  insertBanishment($end_date, $start_date, $user, $adm);
  
  header('location: list_reports.php');

} catch (PDOException $e) {
  $err_msg = $e->getMessage();
  $_SESSION['msg'] = "Não foi possível o banimento!";
  header('Location: list_reports.php');
}
?>