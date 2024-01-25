<?php

// echo'coucou'.'</br>';
include '../config/database.php';
include '../app/persistances/blogPostData.php';







$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
$action = $action ?? 'Accueil';

switch ($action) {
    case 'Accueil':
        include '../app/controllers/homeController.php';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        $metatitle = 'Erreur 404 - Not Found';
        include '../ressources/views/errors/404.php';
}