<?php
  require_once('src/components/init.php');
  require_once('src/person.php');
  
  $photo = $_FILES['Fotografia'];
  $name = $_POST['Nome'];
  $phone_number = $_POST['Telemóvel'];
  $birthdate = $_POST['Nascimento'];

  if (strlen($name) == 0) {
    $_SESSION['msg'] = 'Nome Inválido!';
    header('Location: edit-profile.php'); 
    die();
  }

  if (strlen($phone_number) == 0) {
    $_SESSION['msg'] = 'Número de telemóvel Inválido!';
    header('Location: edit-profile.php');
    die();
  }

  try {
    updatePersonbyEmail($name,$birthdate,$phone_number,$_SESSION['email']);
    updateProfilePic($photo,$_SESSION['email']);
    header('Location: profile.php'); 
  }
  catch(PDOException $e) {
    $err_msg = $e->getMessage();
    $_SESSION['msg'] = "Não foi possível mudar o seu perfil!($err_msg)";
    header('Location: edit-profile.php'); 
 }
 
?>