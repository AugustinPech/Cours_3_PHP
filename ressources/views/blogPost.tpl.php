<?php
$metatitle = ' Article Page';
$metadescription = 'Affiche 1 article et ses commentaires';
include '../ressources/views/layouts/head.tpl.php';
include '../ressources/views/layouts/header.tpl.php';
?>
<div class="d-flex cdiv-12 flex-row flex-wrap justify-content-around ">
    <?php if (count($comments) > 0) : foreach ($comments as $comment) : ?>
        
            <div class="d-flex flex-column col-4 m-1">
                <blockquote  cite="">
                    <p class="mb-0">
                        <?php echo $comment['body'] ?>
                    </p>
                    <footer class="ms-2">
                        <em>By <a href="" class=""><u><?php echo $comment['pseudo'] ?></u></a> </em>
                    </footer>
                </blockquote>
            </div>
    <?php endforeach; else : ?>
        <div>
            Aucun commentaires pour le moment.
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
