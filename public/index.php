<?php

echo'coucou'.'</br>';
include '../config/database.php'
// $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

// $directory = 'pages/';
// $test = dirname($_SERVER['PHP_SELF']);
// $filesPath = glob($directory . '*');

// $filesNames = array_map(
//     function ($val) {
//         return explode(".", $val)[0];
//     },
//     scandir('pages', SCANDIR_SORT_NONE)
// );

// $indexName = array_search($page, $filesNames);
// $indexPath = array_search(
//     $page,
//     array_map(
//         function ($val) {
//             return explode(".", explode('pages/', $val)[1])[0];
//         },
//         $filesPath
//     )
// );


// if (isset($page) && $page == $filesNames[$indexName] && $page!='404') {
//     include $filesPath[$indexPath];
//     je suis parfaitement contient de la gigantesque faille de sécurité que j'ai laissé ici
// } else {
//     header('HTTP/1.0 404 Not Found');
//     $metatitle = 'Erreur 404 - Not Found';
//     include '../ressources/views/layouts/head.php';
//     include '../ressources/views/layouts/header.php';
//     include '../ressources/views/errors/404.php';
//     include '../ressources/views/layouts/footer.php';
// }
?>