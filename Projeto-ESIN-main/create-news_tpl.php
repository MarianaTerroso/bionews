<div class="column">
    <h2>Criar Notícia</h2>
    <form method="POST" action="action_create-news.php" enctype="multipart/form-data">
        <div class="form-block">
            <label for="title">Título</label>
            <input name="title" type="text" required="required" />
        </div>
        <div class="form-block">
            <label for="tags">Tags</label>
            <div class="row-form-group">
                <select multiple="multiple" name="tags[]" required="required">
                <?php
                $tags = getListTags();
                foreach ($tags as $tag) {
                    echo '<option value=' . $tag['name'] . '>' . $tag['name'] . '</option>';
                }
                ?>
                </select>
            </div>
        </div>
        <div class="form-block">
            <label for="image">Imagem</label>
            <input name="image" type="file" required="required" />
        </div>
        <div class="form-block">
            <label for="summary">Resumo</label>
            <textarea name="summary" required="required"></textarea>
        </div>
        <div class="form-block">
            <label for="content">Conteúdo</label>
            <textarea name="content" required="required"></textarea>
        </div>
        <p><span class = "error"><?php if(isset($_SESSION["msg"])) { echo $_SESSION["msg"]; unset($_SESSION["msg"]);}else { } ?></span></p>
        <button class="filled-button button-submit" type="submit">Submeter</button>
    </form>
    <form method="POST" action="action_insert_tag.php">
        <div class="form-block">
            <label for="title">Inserir Tag</label>
            <input name="tag" type="text" />
        </div>
        <button class="filled-button button-submit" type="submit">Submeter</button>
    </form>
</div>