<?php
function getTagByNew($id){
    global $dbh;
    $stmt = $dbh->prepare('SELECT tag from TagNews where news=?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function insertTagNews($tag, $news)
{
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO TagNews (tag, news) VALUES(?,?)');
    $stmt->execute(array($tag, $news));
}

function getNumberofRelatedNews($tag){
    global $dbh;
    $stmt = $dbh->prepare('SELECT count(*) as count from TagNews GROUP BY tag=? ');
    $stmt->execute(array($tag));
    return $stmt->fetch()['count'];
}

function getListRelatedNews($tag){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM TagNews WHERE tag= ?');
    $stmt->execute(array($tag));
    return $stmt->fetchAll();
}

function getListTags()
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Tag');
    $stmt->execute(array());
    return $stmt->fetchAll();
}

function getListTagsByNew($news)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM TagNews where news=?');
    $stmt->execute(array($news));
    return $stmt->fetchAll();
}

function addTagToTags($tag){
    try {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO Tag(name) VALUES (?)');
        $stmt->execute(array($tag));
    } catch (Exception $e) {
        $err_msg = $e->getMessage();
        $_SESSION['msg'] = "Não foi possível adicionar a Tag. Por favor, tente outra vez ($err_msg).";
        header('Location: create-news.php');
    }
}

function updateTagNews($tag, $news){
    global $dbh;
    $stmt = $dbh->prepare('UPDATE TagNews set tag = ? where news = ?');
    $stmt->execute(array($tag,$news));
}

function deleteAllTagsFromNews($id) {
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM TagNews WHERE news=?');
    $stmt->execute(array($id));
}