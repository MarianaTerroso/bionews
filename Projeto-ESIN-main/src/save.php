<?php
function insertSave($news,$person) {
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Save (news, person) VALUES (?,?)');
    $stmt->execute(array($news,$person));
}

function getNumberofSavedNews($person){
    global $dbh;
    $stmt = $dbh->prepare('SELECT count(*) as count from Save GROUP BY person=?');
    $stmt->execute(array($person));
    return $stmt->fetch()['count'];
}

function getListSavedNews($person){
    global $dbh;
    $stmt =$dbh->prepare('SELECT * FROM Save where person=?');
    $stmt->execute(array($person));
    return $stmt->fetchAll();
}

function deleteSave($news, $person) {
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM Save WHERE news=? AND person=?');
    $stmt->execute(array($news,$person));
}

function savedNews($person,$news){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Save WHERE person = ? AND news= ?');
    $stmt->execute(array($person,$news));
    return $stmt->fetch();
}

function deleteAllSavesFromNews($news) {
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM Save WHERE news=?');
    $stmt->execute(array($news));
}