<?php
  require_once('src/components/init.php'); #VER ISTO
  session_destroy();
  header('Location: index.php'); 
?>