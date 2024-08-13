<div class="column">
    <h2>Denunciar</h2>
    <form method="POST" action="action_report.php?id=<?php echo $id?>">
        <div class="form-block">
            <h4>Porque é que está a denunciar este comentário ? :</h4>
            <div class="radio">
                <input type="radio" name="motive" id="reason" value="spam">
                <label for="spam">Spam</label>
            </div>
            <div class="radio">
                <input type="radio" name="motive" id="reason" value="sexual activity">
                <label for="nudez ou atividade sexual">Nudez ou atividade sexual</label>
            </div>
            <div class="radio">
                <input type="radio" name="motive" id="reason" value="fraud">
                <label for="fraude">Fraude</label>
            </div>
            <div class="radio">
                <input type="radio" name="motive" id="reason" value="hateful speech or symbols">
            <label for="discurso ou símbolos de incentivo ao ódio">Discurso ou símbolos de incentivo ao ódio</label>
            </div>
            <div class="radio">
                <input type="radio" name="motive" id="reason" value="false information">
                <label for="informações falsas">Informações falsas</label>
            </div>
            <div class="radio">
                <input type="radio" name="motive" id="reason" value="bullying or harassment">
            <label for="bullying ou assédio">Bullying ou assédio</label>
            </div>
            <div class="radio">
                <input type="radio" name="motive" id="reason" value="violence or dangerous organizations">
                <label for="violência ou organizações perigosas">Violência ou organizações perigosas</label>
            </div>
            <div class="radio">
                <input type="radio" name="motive" id="reason" value="intellectual property infringement">
                <label for="infração à propriedade intelectual">Infração à propriedade intelectual</label>
            </div>
            <div class="radio">
                <input type="radio" name="motive" id="reason" value="suicide or self-harm">
            <label for="suicídio ou automutilação">Suicídio ou automutilação</label>
            </div>
        </div>
        <p><span class = "error"><?php if(isset($_SESSION["msg"])) { echo $_SESSION["msg"];unset($_SESSION["msg"]);}else { } ?></span></p>
        <button class="filled-button button-submit" type="submit">Submeter</button>
    </form>
</div>