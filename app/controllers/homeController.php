<?php

$askForMoreArticles=filter_input(INPUT_POST, 'moreArticles', FILTER_SANITIZE_SPECIAL_CHARS);
$count=1;
setcookie('count', $count, time()+60);
if ($askForMoreArticles == 'Afficher Plus d`Articles') {
    $count = $_COOKIE['count'] + 1;
}


$numberOfArticles=6 * $count;

$lastArticles= lastBlogPosts($pdo, $numberOfArticles);


if ($askForMoreArticles){
    setcookie('count', $count, time()+60);
}

include '../ressources/views/home.tpl.php';