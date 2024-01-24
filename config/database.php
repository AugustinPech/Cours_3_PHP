<?php
include 'variables.php';
$pdo = new PDO('mysql:host=blog.local;dbname=TestDB-Articles',  $user, $pass);
$statement = $pdo->query("SELECT * FROM Articles");
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($row as $key => $value) {
    $data = '';
    foreach ($row[$key] as $key => $value) {
        $data = $data . "[$key] - - $value </br>";
    };
    echo "$data </br>" ;
};

print_r($row);
