<?php

$askForMoreOrLessArticles=filter_input(INPUT_POST, 'moreOrLessArticles', FILTER_SANITIZE_SPECIAL_CHARS);

$count=0;
setcookie('count', $count, time()+60);

if ($askForMoreOrLessArticles == 'Afficher Plus d`Articles') {
    $count = $_COOKIE['count'] + 1;
} elseif ($askForMoreOrLessArticles == 'Afficher Moins d`Articles') {
    $count = (($_COOKIE['count'] - 1) > 0)? ($_COOKIE['count'] - 1) : 0 ;
}
setcookie('count', $count, time()+60);

$numberOfArticles= 4 + 2 * $count ;

$lastArticles= lastBlogPosts($pdo, $numberOfArticles);


// if ($askForMoreOrLessArticles){
//     setcookie('count', $count, time()+60);
// }

include '../ressources/views/home.tpl.php';