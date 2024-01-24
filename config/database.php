<?php
$user='AugustinPech';
$pass='25111991';
try {
    $pdo = new PDO('mysql:host=blog.local;dbname=TestDB-Articles',  $user, $passarray(
        PDO::ATTR_PERSISTENT => true
    ));
} catch (PDOException $e) {
    echo 'UnAble to connect to the DataBase';
}
