<div class="column">
    <h2>Editar Perfil</h2>
    <form action="action_edit-profile.php" method="POST">
        <div class="form-block">
            <label>Nome</label>
            <input name="Nome" type="text" required="required" value= "<?php echo getNamePersonByEmail($_SESSION['email']) ?>">
            <label>Telemóvel</label>
            <input name="Telemóvel" type="text" required="required" value= "<?php echo getPhonePersonByEmail($_SESSION['email'])?>">
            <label>Nascimento</label>
            <input name="Nascimento" type="date" required="required" value= "<?php echo getBirthdayPersonByEmail($_SESSION['email'])?>">
        </div>
        <p><span class = "error"><?php if(isset($_SESSION["msg"])) { echo $_SESSION["msg"]; unset($_SESSION["msg"]);}else { } ?></span></p>
        <button class="filled-button button-submit" type="submit">Submeter</button>
        <p><span class = "error"><?php echo $_SESSION['msg']; ?></span></p>
    </form>
</div>