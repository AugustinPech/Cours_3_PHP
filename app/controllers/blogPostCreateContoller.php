<?php
if( count($_POST) !==0) {
    $filters = array_fill_keys(array_keys(filter_input_array(INPUT_POST)),FILTER_SANITIZE_SPECIAL_CHARS);
    $formulaire=filter_input_array(INPUT_POST, $filters);
    try {
        blogPostCreate($pdo, $formulaire);
    } catch (PDOException $e) {
        echo "entrée invalide";
    }
}
$allAuthors=allAuthors($pdo);
// foreach ($allAuthors as $author) {var_dump($author['pseudo']);echo '<br>';}

include '../ressources/views/blogPostCreate.tpl.php';

