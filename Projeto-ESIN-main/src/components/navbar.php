<?php require_once 'src/person.php' ?>
<?php require_once 'src/adm.php' ?>
<nav>
    <a href="/"><img class="navbar-logo" src="img/logo.jpg" alt="BioNews" /></a>
    <div class="navbar-right">
        <div class="navbar-link">
            <?php if(isset($_SESSION["email"])) { ?>
            <a class="navbar-link profile-icon" href="profile.php" title="Perfil"><img class="img-icon margin-left-icon icon-create-news" src="img/person-circle.svg" alt="Perfil" /><h4 class="profile-icon"><?php echo getNamePersonByEmail($_SESSION["email"]);?></h4></a>
            <a class="navbar-link logout-icon" href="action_logout.php"  title="Sair">Sair</a>     
            <a class="navbar-link" href="/saved_news.php" title="Notícias guardadas"><img class="img-icon margin-left-icon icon-create-news" src="img/bookmarks-fill.svg" alt="Notícias Guardadas" /></a>
            <?php
            if(getAdmByEmail($_SESSION["email"])) {
                ?>
            <a class="navbar-link" href="/list_reports.php" title="Painel de admnistração"><img class="img-icon margin-left-icon icon-create-news" src="img/layout-text-sidebar-reverse.svg" alt="Painel de Admnistração" /></a>  
            <a class="navbar-link" href="/create-news.php" title="Criar notícia"><img class="img-icon margin-left-icon icon-create-news" src="img/newspaper.svg" alt="Criar Notícia" /></a>  <?php } ?>         <!-- aqui colocar create tags-->   
            <?php }else 
            {?><a class="navbar-link" href="/login.php" title="Entrar">Entrar</a>
            <a class="navbar-link" href="/register.php" title="Registar">Registar</a><?php }?>

        </div>
        
    </div>  
</nav>
