<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

try {
    blogPostDelete($pdo, $id);
    header('Location: /index.php');
} catch (Exception $e) {
    echo 'Fail on Delete';
}