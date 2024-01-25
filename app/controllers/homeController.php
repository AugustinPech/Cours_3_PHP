<?php
include '../ressources/views/layouts/head.php';
include '../ressources/views/layouts/header.php';
?>
<h1>BOUH</h1>
<?php

$statement = $pdo->query(lastBlogPosts());
$row = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($row as $key => $value) {
    $data = '';
    foreach ($row[$key] as $key => $value) {
        $data = $data . "[$key] - - $value </br>";
    };
    echo "$data </br>" ;
};
?>

<?php
include '../ressources/views/layouts/footer.php';
?>