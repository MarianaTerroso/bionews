<div class="form-column">
        <h2 class="titulo-esquerda">Fim do banimento</h2>
        <h5>Por favor coloque a data para o fim do banimento.</h5>
        <form method="POST" action="action_remove_and_banish.php?id=<?php echo $id?>">
          <div class="form-block">
          <input name="end_date" type="date" required="required"> 
          </div> 
          <button class="filled-button button-submit" type="submit">Banir</button>
        </form>
</div>
