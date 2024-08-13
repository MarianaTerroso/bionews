<?php
require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/reactionnews.php');
require_once('src/reactioncomment.php');
require_once('src/comments.php');
require_once('src/news.php');
require_once('src/tagnews.php');
require_once('src/save.php');

$news = $_GET["id"];
foreach (getListComments($news) as $comment){
    deleteAllReactionComment($comment);
}
deleteAllCommentsFromNews($news);
deleteAllTagsFromNews($news);
deleteAllSavesFromNews($news);
deleteNews($news);
header('location: index.php');
