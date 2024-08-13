<div class="column">
<h1>Perfil</h1>
<div class="q">
    <div><img src="img/profiles/<?php echo getIdPersonByEmail($_SESSION['email'])?>.jpg" alt="Profile" height="100" width="100"></div>  
    <div class="profile-info">
    <div><span class="label2">Nome: </span><span><?php echo getNamePersonByEmail($_SESSION['email']) ?></span></div> 
    <div><span class="label2">Email: </span><span><?php echo $_SESSION['email'] ?></span></div> 
    <div><span class="label2">Telemóvel: </span><span><?php echo getPhonePersonByEmail($_SESSION['email'])?></span></div> 
    <div><span class="label2">Data nascimento: </span><span><?php echo getBirthdayPersonByEmail($_SESSION['email'])?></span></div> 
    </div>
</div>
<a class="button filled-button button-submit" type="button" href="edit-profile.php">Editar Perfil</a>
<a class="button filled-button button-submit" type="button" href="edit-password.php">Editar Senha</a>