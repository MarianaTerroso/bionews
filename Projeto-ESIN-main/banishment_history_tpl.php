<div class="painel">
        <?php $id=$_GET['id']; 
        $banishments = getListBanishments()?>
        <h2>Painel de Administração</h2>
        <h3>Histórico de Banimentos: <?php echo getNamePersonById($id)?></h3>
        <?php if (getNumberofBanishmentsofUser($id) == 0) { ?>
         <p>Histórico Vazio</p>
        <?php } else { ?>
        <?php foreach($banishments as $banishment) { 
          if ($banishment['user']==$id) {?>
        <div class="history-banish">
            <h6>Data de Início: <?php echo $banishment['start_date']?></h6>
            <h6>Data de Fim: <?php echo $banishment['end_date']?></h6>
            <h6>Banido por: <?php echo getNamePersonById($banishment['adm'])?></h6>
        </div>
        <?php } } ?>
        <?php } ?>
    </div>
    <div class="reports-or-appeal">
    <a class="reports-on" href="list_reports.php">Reportes</a>
    <br><a class="appeals-off" href="list_appeals.php">Apelos</a>
</div>
