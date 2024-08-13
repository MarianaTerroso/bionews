<?php
  require_once('src/components/init.php');
  require_once('src/person.php');
  require_once('src/report.php');
  
  $reason = $_POST['motive'];
  $person = getIdPersonByEmail($_SESSION['email']);
  $status = 'to analyse';
  $comment = $_GET['id'];

  if (!isset($reason)) {
    $_SESSION['msg'] = 'Tem de selecionar uma das opções!';
    header('location: ' . $_SERVER['HTTP_REFERER']);
    die();
  }

  try {
    insertReport($person,$reason,$status,$comment);
    header('Location: index.php');  
    
  }
  catch(PDOException $e) {
    $err_msg = $e->getMessage();
    $_SESSION['msg'] = "Não foi possível fazer o reporte!($err_msg)";
    header("Location: report-user.php?id=$comment"); 
 }
 
?>

