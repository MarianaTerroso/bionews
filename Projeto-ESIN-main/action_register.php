<?php
  require_once('src/components/init.php'); 
  session_start();
  require_once('src/person.php'); 
  require_once('src/user.php'); 
  require_once('src/adm.php'); 

  $email = $_POST['Email'];
  $name = $_POST['Nome'];
  $phone_number = $_POST['Telemóvel'];
  $birthdate = $_POST['Nascimento'];
  $password = $_POST['Senha'];
  $confirm_password = $_POST['Confirme'];
  $photo = $_FILES['Fotografia'];
  $code=$_POST['codigo'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['msg'] = 'Formato de email inválido!';
    header('Location: register.php'); 
    die();
  }

  if (strlen($email) == 0) {
    $_SESSION['msg'] = "Email Inválido!";
    header('Location: register.php'); 
    die();
  }  


  if (strlen($phone_number) == 0) {
    $_SESSION['msg'] = 'Número de telemóvel Inválido!';
    header('Location: register.php'); 
    die();
  }


  if (strlen($password) < 8) {
    $_SESSION['msg'] = 'A senha deve ter pelo menos 8 caracteres.';
    header('Location: register.php'); 
    die();
  }

 if ($password != $confirm_password) {
  $_SESSION['msg'] = 'A senha não é igual.';
  header('Location: register.php'); 
  die();
  }

  if ($code !== "admcode" && !empty($code)){
    $_SESSION['msg'] = 'Código de acesso inválido.';  
    header('Location: register.php'); 
    die();
  }

  $enrollment_date = date("Y/m/d");

  
  if ($code==null){
   try {
     insertPerson($email,$name, $birthdate,$phone_number, $password, $enrollment_date);
     saveProfilePic($photo,getLastIdPerson());    
     insertUser(getLastIdPerson());
     $_SESSION["email"] = $email;
     header('Location: register_sucesso.php');     
    }
     catch(PDOException $e) {
     $err_msg = $e->getMessage();

     if (strpos($err_msg, 'UNIQUE')) {
       $_SESSION['msg'] = 'Este email já existe!'; 
     } else {
       $_SESSION['msg'] = "Não foi possível o seu registo!"; 
     }
     header('Location: index.php'); 
    }
  } else {
    try {
      insertPerson($email,$name, $birthdate,$phone_number, $password, $enrollment_date);
      saveProfilePic($photo, getLastIdPerson());    
      insertAdm(getLastIdPerson());
      $_SESSION["email"] = $email;
      header('Location: register_sucesso.php');     
    }
      catch(PDOException $e) {
      $err_msg = $e->getMessage();
 
      if (strpos($err_msg, 'UNIQUE')) {
        $_SESSION['msg'] = 'Este email já existe!'; 
      } else {
        $_SESSION['msg'] = "Não foi possível o seu registo!"; 
      }
      header('Location: index.php'); 
    }

  }


?>
