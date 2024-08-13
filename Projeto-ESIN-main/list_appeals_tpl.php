<?php $title = 'Apelos' ?>
<?php require_once 'src/components/init.php' ?>
<?php require_once 'src/appeal.php' ?>
<?php require_once 'src/components/layout_top.php' ?>
<?php 
if(!isset($_SESSION["email"])){
    header('Location: index.php'); 
}
if(!(getAdmByEmail($_SESSION["email"]))){
  header('Location: index.php'); 
}
?>
    <div class="painel">
     <h2>Painel de Administração</h2>
     <?php if (getNumberofAppeals() == 0) { ?>
       <p>Sem Apelos</p>
     <?php } else { 
      $appeals=getListAppeals();
       foreach ($appeals as $appeal) {
         if ($appeal['status'] == 'to analyse') { ?> 
       <div class="person-to-banish">
            <h6><?php echo getNamePersonById(getUserIdByBanishment($appeal['banishment'])) ?></h6>
            <div class="history">
             <img class="history-image" src="img/history_icon.png" alt="Profile" height="15" width="15">
             <a class="history-link" href="banishment_history.php?id=<?php echo getUserIdByBanishment($appeal['banishment']); ?>">Histórico</a> 
            </div> 
            <p><?php echo $appeal['text'] ?></p>   
            <div class="opçoes">   
            <form method='post' action="action_remove_and_accept.php?id=<?php echo $appeal['banishment'] ?>">   
             <button class="filled-button button-submit" type="radio" name="permitir">Aceitar</button>
            </form>
            <form method='post' action="action_remove_and_reject.php?id=<?php echo $appeal['banishment'] ?>"> 
             <button class="filled-button button-submit button-to-nobanish" type="radio" name="nao_permitir">Rejeitar</button>
            </form>
            </div>    
       </div>
     <?php }
       } ?>
     <?php } ?>
    </div>
    <div class="reports-or-appeal">
        <a class="reports-off" href="list_reports.php">Reportes</a>
        <br><a class="appeals-on" href="list_appeals.php">Apelos</a>
    </div>
    <?php require_once 'src/components/layout_bottom.php' ?>