<div class="form-column">
        <h2 class="titulo-esquerda">Registar</h2>
        <form action="action_register.php" method="post" enctype="multipart/form-data">
         <div class="form-block">
          <label>Email</label>
          <input name="Email" type="text" required="required">
          <label>Nome de Utilizador</label>
          <input name="Nome" type="text" required="required">
          <label>Telemóvel</label>
          <input name="Telemóvel" type="text" required="required">
          <label>Data de Nascimento</label>
          <input name="Nascimento" type="date" required="required">
          <label>Senha</label>
          <input name="Senha" type="password" required="required">
          <label>Confirme a senha</label>
          <input name="Confirme" type="password" required="required">
          <label>Fotografia</label>
          <input type="file" name="Fotografia" accept="image/png,image/jpeg"  required="required">
          <label>Registar-se como admnistrador? Por favor digite o código de acesso.</label>
          <input type="password" name="codigo">
         </div>
         <button class="filled-button button-submit" type="submit">Registar</button>
         <p><span class = "error"><?php if(isset($_SESSION["msg"])) { echo $_SESSION["msg"]; unset($_SESSION["msg"]);}else { } ?></span></p>
        </form>
        <div id="backtologin">
            Já está registado? <a href="login.php">Entrar</a>
        </div>
</div>
