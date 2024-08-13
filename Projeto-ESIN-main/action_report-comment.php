<?php
  require_once('src/components/init.php');
  if (isset($_SESSION["email"])) {
  $id = $_GET['id'];
  header("location:report-user.php?id=$id");
}else {
  header ('Location: login.php');
}
?>