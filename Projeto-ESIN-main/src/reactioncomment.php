<?php
  function insertReactionComment($comment,$person,$type) {
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO ReactionComment (comment, person, type) VALUES(?,?,?)');
    $stmt->execute(array($comment,$person,$type));
  }

function getReactionComment($comment,$person) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM ReactionComment WHERE comment=? AND person=?');
    $stmt->execute(array($comment,$person));
    return $stmt->fetch();
}

function reactedComment($type,$person,$comment){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM ReactionComment WHERE type = ? AND person = ? AND comment= ?');
    $stmt->execute(array($type,$person,$comment));
    return $stmt->fetch();
  }

function deleteAllReactionComment($comment){
  global $dbh;
  $stmt = $dbh->prepare('DELETE FROM ReactionComment WHERE comment=?');
  $stmt->execute(array($comment));
}

function deleteAnyReactionComment($comment, $person){
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM ReactionComment WHERE comment=? AND person=?');
    $stmt->execute(array($comment,$person));
}

function deleteReactionComment($comment, $person, $type){
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM ReactionComment WHERE comment=? AND person=? AND type=? ');
    $stmt->execute(array($comment,$person,$type));
  } 

  function getNumberOfReactionComment($comment,$type){
    global $dbh;
    $stmt = $dbh->prepare('SELECT count(*) as count from ReactionComment WHERE comment=? AND type=?');
    $stmt->execute(array($comment,$type));
    return $stmt->fetch()['count'];
  }
?>