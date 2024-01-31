<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$article = oneArticle($pdo, $id);
$comments = allCommentsOfOneArticle($pdo, $id);

if( count($_POST) !==0) {
    $filters = array_fill_keys(array_keys(filter_input_array(INPUT_POST)),FILTER_SANITIZE_SPECIAL_CHARS);
    $formulaire=filter_input_array(INPUT_POST, $filters);
    try {
        blogPostUpdate($pdo,$article[0]['id'] , $formulaire);
    } catch (PDOException $e) {
        echo "entrée invalide";
    }
}

include '../ressources/views/blogPostModify.tpl.php';