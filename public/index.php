<?php

echo'coucou'.'</br>';
include '../config/database.php';
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

switch ($action) {
    default:
    include '../app/controllers/homeController.php';
        // header('HTTP/1.0 404 Not Found');
        // $metatitle = 'Erreur 404 - Not Found';
        // include '../ressources/views/layouts/head.php';
        // include '../ressources/views/layouts/header.php';
        // include '../ressources/views/errors/404.php';
        // include '../ressources/views/layouts/footer.php';
}