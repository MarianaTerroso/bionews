<?php
  require_once('src/components/init.php');
  require_once('src/person.php');
  require_once('src/appeal.php');

     $text = $_POST['apelo'];
     $status = 'to analyse';
     $banishment = $_GET ['id'];
     insertAppeal($text,$banishment,$status);
     header('location: index.php');
    
?>
