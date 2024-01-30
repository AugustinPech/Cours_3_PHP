<?php
if( count($_POST) !==0) {$filters = array_fill_keys(array_keys(filter_input_array(INPUT_POST)),FILTER_SANITIZE_SPECIAL_CHARS);
    $formulaire=filter_input_array(INPUT_POST, $filters);
    $formulaire['pseudo']=($formulaire['pseudo']=='') ? 'anonyme' : $formulaire['pseudo'];
    try {
        blogPostCreate($pdo, $formulaire);
    } catch (PDOException $e) {
        echo "entrée invalide";
    }
}

include '../ressources/views/blogPostCreate.tpl.php';

