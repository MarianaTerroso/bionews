<?php
function insertUser($user){
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO User(id) VALUES (?)');
        $stmt->execute(array($user));
    }
?>