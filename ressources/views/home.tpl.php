<?php
$metatitle = ' Blog Home Page';
$metadescription = 'Home - Affiche la liste des 10 derniers articles';
include '../ressources/views/layouts/head.tpl.php';
include '../ressources/views/layouts/header.tpl.php';
?>
<div class="d-flex cdiv-12 flex-row flex-wrap justify-content-around ">
    <?php if (count($lastArticles) > 0) : foreach ($lastArticles as $article) : ?>
        
            <div class="d-flex flex-column col-4 m-1">
                <a href="<?php echo "/index.php?action=blogPost&id=".$article['id']; ?>" class="link-dark link-underline-opacity-0">
                    <b class="border-bottom">
                        <?php echo $article['title'] ?>
                    </b>
                </a>
                <blockquote  cite="">
                    <p class="mb-0">
                        <?php echo $article['body'] ?>
                    </p>
                    <footer class="ms-2">
                        <em>By <a href="" class=""><u><?php echo $article['pseudo'] ?></u></a> </em>
                    </footer>
                </blockquote>
            </div>
    <?php endforeach; else : ?>
        <div>
            Aucun articles pour le moment.
        </div>
    <?php endif; ?>
</div>
<div class="d-flex col-12 flex-row flex-wrap justify-content-around ">
    <form method="post">
        <input type="submit" name="moreArticles" class="button" value="Afficher Plus d'Articles" />
    </form>
</div>
<?php
include '../ressources/views/layouts/footer.tpl.php';
