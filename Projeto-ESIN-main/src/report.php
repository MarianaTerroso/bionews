<?php
function getPersonIdByComment($comment){
    global $dbh;
    $stmt = $dbh->prepare('SELECT person from Comment WHERE id = ?');
    $stmt->execute(array($comment));
    return $stmt->fetch()['person'];
}

function getNumberofReports(){
    global $dbh;
    $stmt = $dbh->prepare('SELECT count(*) as count from Report');
    $stmt->execute();
    return $stmt->fetch()['count'];
}

function getUserIdByComment($comment){
    global $dbh;
    $stmt = $dbh->prepare('SELECT person from Comment where id = ?');
    $stmt->execute(array($comment));
    return $stmt->fetch()['person'];
}

function updateStatusofReport($status,$user,$comment){
    global $dbh;
    $stmt= $dbh->prepare('UPDATE Report set status = ? where user = ? AND comment= ?');
    $stmt->execute(array($status,$user,$comment));
}


function getListReports(){
    global $dbh;
    $stmt =$dbh->prepare('SELECT * FROM Report');
    $stmt->execute();
    return $stmt->fetchAll();
  }

function insertReport($name,$reason,$status,$comment){
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Report (user, reason, status, comment) VALUES(?,?,?,?)');
    $stmt->execute(array($name,$reason,$status,$comment));
}
?>