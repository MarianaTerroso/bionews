<?php
function insertNews($date, $title, $content, $summary, $adm){
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO News (publication_date, title, content, summary, adm) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute(array($date, $title, $content, $summary, $adm));
}

function deleteNews($id){
    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM News WHERE id=?');
    $stmt->execute(array($id));
}

function saveNewsPic($photo, $id){
    move_uploaded_file($photo["tmp_name"], "img/newsphotos/$id.jpg");
}

function getNumberofNews(){
    global $dbh;
    $stmt = $dbh->prepare('SELECT count(*) as count from News');
    $stmt->execute();
    return $stmt->fetch()['count'];
}

function getListNews($page){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM News ORDER BY id DESC LIMIT ? OFFSET ?');
    $stmt->execute(array(6, ($page - 1) * 6));
    return $stmt->fetchAll();
}

function getTitleNewsById($id){
    global $dbh;
    $stmt = $dbh->prepare('SELECT title from News where id=?');
    $stmt->execute(array($id));
    return $stmt->fetch()['title'];
}

function getSummaryNewsById($id){
    global $dbh;
    $stmt = $dbh->prepare('SELECT summary from News where id= ?');
    $stmt->execute(array($id));
    return $stmt->fetch()['summary'];
}

function getAuthorNewsById($id){
    global $dbh;
    $stmt = $dbh->prepare('SELECT name from person where person.id in (select adm from News WHERE id=?)');
    $stmt->execute(array($id));
    return $stmt->fetch()['name'];
}

function getDateNewsById($id){
    global $dbh;
    $stmt = $dbh->prepare('SELECT publication_date from News where id= ?');
    $stmt->execute(array($id));
    return $stmt->fetch()['publication_date'];
}

function getTextNewsById($id){
    global $dbh;
    $stmt = $dbh->prepare('SELECT content from News where id= ?');
    $stmt->execute(array($id));
    return $stmt->fetch()['content'];
}

function getPhotoNewsById($id){
    global $dbh;
    $stmt = $dbh->prepare('SELECT photo from News where id= ?');
    $stmt->execute(array($id));
    return $stmt->fetch()['photo'];
}

function getLastIdNews(){
    global $dbh;
    $stmt = $dbh->prepare('SELECT MAX(id) as maxi FROM News');
    $stmt->execute();
    return $stmt->fetch()['maxi'];
}

function updateNews($title, $content, $summary, $id){
    global $dbh;
    $stmt = $dbh->prepare('UPDATE News set title = ?, content =?, summary = ? where id = ?');
    $stmt->execute(array($title, $content, $summary, $id));
}

function updateNewsPic($image, $id){
    global $dbh;
    $stmt = $dbh->prepare('UPDATE News set photo = ? where id = ?');
    $stmt->execute(array($image,$id));
}