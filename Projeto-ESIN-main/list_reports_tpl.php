<div class="painel">
      <h2>Painel de Administração</h2>
      <?php if ( getNumberofReports() == 0) { ?>
       <p>Sem Reportes</p>
      <?php } else { 
      $reports=getListReports();
      foreach($reports as $report) {
              if ($report['status'] == 'to analyse') { ?> 
       <div class="person-to-banish">
            <h6><?php echo getNamePersonById(getPersonIdByComment($report['comment'])) ?></h6>
            <div class="history">
             <img class="history-image" src="img/history_icon.png" alt="Profile" height="15" width="15">
             <a class="history-link" href="banishment_history.php?id=<?php echo getPersonIdByComment($report['comment']); ?>">Histórico</a> <!--VER ISTO-->
            </div> 
            <p>Utilizador acusado de: <?php echo $report['reason'] ?></p>   
            <p>Comentário reportado: "<?php echo getTextByComment($report['comment']) ?>"</p>
            <div class="opçoes">     
            <form method='post' action="action_go-to-end-date.php?id=<?php echo getPersonIdByComment($report['comment']) ?>">   
             <button class="filled-button button-submit" type="radio" name="banir" >Banir</button> </form>
            <form method='post' action="action_remove_and_nobanish.php?id=<?php echo getPersonIdByComment($report['comment']) ?>">  
             <button class="filled-button button-submit button-to-nobanish" type="radio" name="nao_banir">Não banir</button> </form>
            </div>    
       </div>
      <?php }} ?>
      <?php } ?>
</div>

<div class="reports-or-appeal">
    <a class="reports-on" href="list_reports.php">Reportes</a>
    <br><a class="appeals-off" href="list_appeals.php">Apelos</a>
</div>