<?php

    function insertBanishment($end_date,$start_date,$user,$adm){
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO Banishment(end_date,start_date,user,adm) VALUES (?,?,?,?)');
        $stmt->execute(array($end_date,$start_date,$user,$adm));
    }
     
    function updateEnddateofBanishmentbyId($end_date,$id){
        global $dbh;
        $stmt = $dbh->prepare('UPDATE Banishment set end_date = ? where id = ?');
        $stmt->execute(array($end_date,$id));

    }

    function getNumberofBanishmentsofUser($user){
        global $dbh;
        $stmt = $dbh->prepare('SELECT count(*) as count from Banishment GROUP BY user=?');
        $stmt->execute(array($user));
        return $stmt->fetch()['count'];
    }

    function userBanished($user) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT MAX(id) AS maxi FROM Banishment WHERE user = ?');
        $stmt->execute(array($user));
        return $stmt->fetch()['maxi'];
    }

    function getLastEndDateofBanishmentsbyUser($user){
        global $dbh;
        $stmt = $dbh->prepare("SELECT end_date from Banishment WHERE user=? and id in (SELECT max(id) FROM Banishment WHERE user=?)");
        $stmt->execute(array($user,$user));
        return $stmt->fetch()['end_date'];
    }

    function getListBanishments(){
        global $dbh;
        $stmt =$dbh->prepare('SELECT * FROM Banishment');
        $stmt->execute();
        return $stmt->fetchAll();
      }


    
?>