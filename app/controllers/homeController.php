<?php

$askForMoreOrLessArticles=filter_input(INPUT_POST, 'moreOrLessArticles', FILTER_SANITIZE_SPECIAL_CHARS);

setcookie('count', 1, time()+60);
if ($askForMoreOrLessArticles == 'Afficher Plus d`Articles') {
    $count = filter_input(INPUT_COOKIE, 'count', FILTER_SANITIZE_SPECIAL_CHARS) + 1;
} elseif ($askForMoreOrLessArticles == 'Afficher Moins d`Articles') {
    $count = ((filter_input(INPUT_COOKIE, 'count', FILTER_SANITIZE_SPECIAL_CHARS)  - 1) > 0)? (filter_input(INPUT_COOKIE, 'count', FILTER_SANITIZE_SPECIAL_CHARS)  - 1) : 0 ;
}
setcookie('count', $count, time()+60);

$numberOfArticles= 2 + 2 * $count ;

$lastArticles= lastBlogPosts($pdo, $numberOfArticles);

include '../ressources/views/home.tpl.php';