<?php
require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/reactionnews.php');
require_once('src/reactioncomment.php');
require_once('src/comments.php');

$comment = $_GET["id"];
deleteComment($comment);
deleteAllReactionComment($comment);
header('location: ' . $_SERVER['HTTP_REFERER']);
