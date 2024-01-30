<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$article = oneArticle($pdo, $id);
$comments = allCommentsOfOneArticle($pdo, $id);
include '../ressources/views/blogPost.tpl.php';