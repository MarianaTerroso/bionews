<section id="saved-news">
    <header>
        <h1 class="main-title-savednews">Notícias guardadas</h1>
    </header>
    <hr class="content-divider">
    <div class="savednews">
        <?php if (getNumberofSavedNews(getIdPersonByEmail($_SESSION['email'])) == 0) {
            echo "<p>Sem Notícias Guardadas</p>";
        } else {
            $savednews = getListSavedNews(getIdPersonByEmail($_SESSION['email']));
            foreach ($savednews as $saved) {
        ?>
        <div class="image">
        <img src="img/newsphotos/<?php echo $saved['news']?>.jpg" alt="Imagem da Notícia" class= "notice_thumb" height="280" width="290">
        </div>
        <div class="savednew"> <!-- mudei aqui a class para savenew--ver css!-->
            <?php foreach (getTagByNew($saved['news']) as $tag) {
                ?>
                <a class="relatednew-tag"><?php echo $tag['tag']; ?></a>
                <?php
            }?>
            <h2 class="new-title">
            <a class="relatednew-title" title="Notícia Completa" href="newspage.php?id=<?php echo $saved['news'];?>">
                <?php echo getTitleNewsById($saved['news']); ?></a>
            </h2>
        </div>
        <?php }
        } ?>
    </div>
</section>