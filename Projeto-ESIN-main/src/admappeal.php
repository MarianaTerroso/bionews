<?php
function insertAdmAppeal($appeal,$adm){
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO AdmAppeal(adm,appeal) VALUES (?,?)');
        $stmt->execute(array($adm,$appeal));
    }
?>