<?php
include '../ressources/views/layouts/head.php';
include '../ressources/views/layouts/header.php';
?>
<h1>BOUH</h1>
<?php
include '../app/persistances/blogPostData.php';

$test = 21 ;
$result=lastBlogPosts($test,1);
var_dump($result);
?>

<?php
include '../ressources/views/layouts/footer.php';
?>