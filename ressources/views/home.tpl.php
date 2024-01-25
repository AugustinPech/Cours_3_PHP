<?php
echo 'Home.tpl';
include '../ressources/views/layouts/head.tpl.php';
include '../ressources/views/layouts/header.tpl.php';
?>
<div class="d-flex col-12 flex-row flex-wrap justify-content-around ">
    <?php if (count($lastArticles)>0) : foreach ($lastArticles as $article) : ?>
        <div class="d-flex flex-column col-4 m-1">
            <h3 class="border-bottom" >
                <?php echo $article['title'] ?>
            </h3>
            <blockquote cite="">
                <p>
                    <?php echo $article['body'] ?>
                </p>
                <footer>
                <em>By <u><?php echo $article['pseudo'] ?></u> </em>
                </footer>
            </blockquote>
        </div>
    <?php endforeach; else : ?>
        <div>
            Aucun articles pour le moment.
        </div>
    <?php endif; ?>
</div>
<?php
include '../ressources/views/layouts/footer.tpl.php';
