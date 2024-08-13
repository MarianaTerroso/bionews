<?php
  require_once('src/components/init.php');
  require_once('src/person.php');
  require_once('src/banishment.php');
  
  $email = $_POST["email"];
  $password = $_POST["Senha"];
 if (userBanished(getIdPersonByEmail($email))!=null && strtotime(getLastEndDateofBanishmentsbyUser(getIdPersonByEmail($email))) > strtotime(date("Y/m/d"))){
    $id=userBanished(getIdPersonByEmail($email));
    header("Location: banimento.php?id=$id");
    session_destroy();

} else {
  if (loginSuccess($email, $password)) {
    $_SESSION["email"] = $email;
    header('Location: index.php');
  } else {
    $_SESSION["msg"] = "Não foi possível iniciar sessão!";
    header('Location: login.php');
  }
}
  
?>