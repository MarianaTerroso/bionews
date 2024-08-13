<?php
function getNumberofComments(){
    global $dbh;
    $stmt = $dbh->prepare('SELECT count(*) as count from Comment');
    $stmt->execute();
    return $stmt->fetch()['count'];
}
function getListComments($id){
    global $dbh;
    $stmt =$dbh->prepare('SELECT * FROM Comment WHERE news=? ORDER BY id DESC ');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function insertComment($date,$text,$news,$person){
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Comment (publication_date, text, news,person) VALUES(?,?,?,?)');
    $stmt->execute(array($date,$text,$news,$person));
}

function getTextByComment($comment){
    global $dbh;
    $stmt = $dbh->prepare('SELECT text from Comment where id = ?');
    $stmt->execute(array($comment));
    return $stmt->fetch()['text'];
}

function deleteAllCommentsFromNews($id) {
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM Comment WHERE news=?');
    $stmt->execute(array($id));
}
function deleteComment($comment) {
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM Comment WHERE id=?');
    $stmt->execute(array($comment));
  }
?>