<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$delete=1;
try {
    blogPostDelete($pdo, $id);
    
} catch (PDOException $e) {
    $delete=0;
}
header("Location: /index.php?delete=$delete&id=$id");