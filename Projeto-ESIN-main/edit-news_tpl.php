<div class="column">
    <h2>Editar Notícia</h2>
    <form action="action_edit-news.php" method="POST">
        <div class="form-block">
            <label>Título</label>
            <textarea name="title" required="required"><?php echo getTitleNewsById($id) ?></textarea>
            <label>Resumo</label>
            <input name="summary" type="text" required="required" value= "<?php echo getSummaryNewsById($id)?>">
            <label>Tags</label>
            <select multiple="multiple" name="tags[]" required="required">
                <?php
                    $t = array_map(function ($i){ return $i['tag'];}, getTagByNew($id));

                    $tags = getListTags();
                    foreach ($tags as $tag) {
                        if(in_array($tag['name'], $t)) {
                            echo '<option selected="selected" value=' . $tag['name'] . '>' . $tag['name'] . '</option>';
                        }else{
                            echo '<option value=' . $tag['name'] . '>' . $tag['name'] . '</option>';
                        }
                    }
                ?>
            </select>
            <label>Conteúdo</label>
            <input name="content" type="text" required="required" value= "<?php echo getTextNewsById($id)?>">
            <input name="id" type="text" required="required" value="<?php echo $id; ?>" style="display: none">
        </div>
        <p><span class = "error"><?php if(isset($_SESSION["msg"])) { echo $_SESSION["msg"]; unset($_SESSION["msg"]);}?></span></p>
        <button class="filled-button button-submit" type="submit">Submeter</button>
        <p><span class = "error"><?php if(isset($_SESSION["msg"])) { echo $_SESSION["msg"]; unset($_SESSION["msg"]);}?> </span></p>
    </form>
</div>