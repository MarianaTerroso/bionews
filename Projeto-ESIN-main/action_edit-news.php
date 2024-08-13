<?php
  require_once('src/components/init.php');
  require_once('src/news.php');
  require_once('src/person.php');
  require_once('src/adm.php');
  require_once('src/tagnews.php');

  $id = $_POST['id'];
  $title = $_POST['title'];
  $image = $_FILES['image'];
  $summary = $_POST['summary'];
  $content = $_POST['content'];
  $tags = $_POST['tags'];


  try {
    updateNewsPic($image, $id);
    updateNews($title, $content, $summary, $id);
    deleteAllTagsFromNews($id);
    foreach ($tags as $tag) {
        insertTagNews($tag, $id);
    }
    header('Location: newspage.php?id='.$id);
  }
  catch(PDOException $e) {
    $err_msg = $e->getMessage();
    $_SESSION['msg'] = "Não foi possível mudar a notícia. Por favor, tente outra vez.($err_msg)";
    header('Location: edit-profile.php'); 
 }