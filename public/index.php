<?php

// echo'coucou'.'</br>';
include '../config/database.php';
include '../app/persistances/blogPostData.php';

$routes = [
    'Accueil'=> '../app/controllers/homeController.php',
    'blogPost'=> '../app/controllers/blogPostController.php',
    'blogPostCreate'=>'../app/controllers/blogPostCreateContoller.php',
    '404' => '../ressources/views/errors/404.php',
];

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
$action = isset($action) ? (array_key_exists($action, $routes) ? $action : '404') : 'Accueil';

include $routes[$action];