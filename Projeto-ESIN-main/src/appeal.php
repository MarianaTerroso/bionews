<?php
function getUserIdByBanishment($banishment){
    global $dbh;
    $stmt = $dbh->prepare('SELECT user from Banishment where id = ?');
    $stmt->execute(array($banishment));
    return $stmt->fetch()['user'];
}

function getNumberofAppeals(){
    global $dbh;
    $stmt = $dbh->prepare('SELECT count(*) as count from Appeal');
    $stmt->execute();
    return $stmt->fetch()['count'];
}

function getListAppeals(){
    global $dbh;
    $stmt =$dbh->prepare('SELECT * FROM Appeal');
    $stmt->execute();
    return $stmt->fetchAll();
  }


 function updateStatusofAppeal($banishment,$status){
    global $dbh;
    $stmt= $dbh->prepare('UPDATE Appeal set status = ? where banishment= ? ');
    $stmt->execute(array($status,$banishment));
}

function insertAppeal($text,$banishment,$status){
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Appeal(text,banishment,status) VALUES (?,?,?)');
    $stmt->execute(array($text,$banishment,$status));
}

?>