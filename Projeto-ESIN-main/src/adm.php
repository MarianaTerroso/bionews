<?php
function insertAdm($adm){
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO Adm(id) VALUES (?)');
        $stmt->execute(array($adm));
    }

function getAdmByEmail($email){
        global $dbh;
        $stmt = $dbh->prepare('SELECT id from adm join person using (id) where person.email = ?');
        $stmt->execute(array($email));
        return $stmt->fetch();
    }    
