<?php
require_once('src/components/init.php');
require_once('src/person.php');
require_once('src/tagnews.php');

addTagToTags($_POST["tag"]);
header('Location: create-news.php');

?>