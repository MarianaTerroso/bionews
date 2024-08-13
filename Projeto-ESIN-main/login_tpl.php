<div class="form-column" >
        <h2 class="titulo-esquerda">Entrar</h2>
        <form method="POST" action="action_login.php">
          <div class="form-block">
           <label>Email</label> 
           <input name="email" type="text" required="required"> 
           <label>Senha</label>
           <input name="Senha" type="password" required="required">           
          </div> 
          <button class="filled-button button-submit" type="submit">Entrar</button>
          <p><span class = "error"><?php if(isset($_SESSION["msg"])) { echo $_SESSION["msg"]; unset($_SESSION["msg"]);}?></span></p>
        </form>
        <div id="registrar_help">
            Ainda não tem um perfil? <a href="register.php">Registe-se</a>
            <br> Esqueceu-se da senha? <a href="pass-esquecida.php">Clique Aqui</a> 
        </div>
</div>