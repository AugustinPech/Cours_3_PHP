<?php
$metatitle = ' Article Page';
$metadescription = 'Affiche 1 article et ses commentaires';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
echo $id;