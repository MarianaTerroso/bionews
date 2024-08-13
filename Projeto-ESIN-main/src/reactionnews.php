<?php
function insertReactionNews($news,$person,$type) {
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO ReactionNews (news, person, type) VALUES(?,?,?)');
    $stmt->execute(array($news,$person,$type));
}

function reactedNews($type,$person,$news){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM ReactionNews WHERE type = ? AND person = ? AND news= ?');
    $stmt->execute(array($type,$person,$news));
    return $stmt->fetch();
}

function deleteReactionNews($news,$person,$type){
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM ReactionNews WHERE news=? AND person=? AND type=? ');
    $stmt->execute(array($news,$person,$type));
}

function getNumberOfReactionNews($new,$type){
    global $dbh;
    $stmt = $dbh->prepare('SELECT count(*) as count from ReactionNews WHERE news=? AND type=?');
    $stmt->execute(array($new,$type));
    return $stmt->fetch()['count'];
}

function deleteAnyReactionNews($news, $person){
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM ReactionNews WHERE news=? AND person=?');
    $stmt->execute(array($news,$person));
}