<div class="form-column">
    <h2>Informa-se que foi banido</h2>
    <form method='post' action="action_appeal.php?id=<?php echo $id?>">
        <div class="form-block">
            <label for="title">Pretende apelar?</label>
            <input name="apelo" type="text" />
        </div>
        <button class="filled-button button-submit" type="submit">Submeter</button>
    </form>
</div>