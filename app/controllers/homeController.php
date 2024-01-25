<?php
$numberOfArticles=10;

$askForMoreArticles= null!==filter_input(INPUT_POST, 'moreArticles', FILTER_SANITIZE_SPECIAL_CHARS);

if($askForMoreArticles) {  // je n'arrive pas à faire afficher "10 de plus" pas à pas
    $moreArticles=isset($moreArticles) ? $moreArticles+100 : $numberOfArticles+10;
    $lastArticles = lastBlogPosts($pdo, $moreArticles);
} else {
    $lastArticles = lastBlogPosts($pdo, $numberOfArticles);
};

include '../ressources/views/home.tpl.php';