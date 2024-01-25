<?php
include 'variables.php';
$pdo = new PDO('mysql:host=blog.local;dbname=TestDB-Articles',  $user, $pass);


// foreach ($row as $key => $value) {
//     $data = '';
//     foreach ($row[$key] as $key => $value) {
//         $data = $data . "[$key] - - $value </br>";
//     };
//     echo "$data </br>" ;
// };

