<?php
$metatitle = "Article n°" . $article[0]['id'] . " - " . $article[0]['title'];
$metadescription = 'Affiche 1 article et ses commentaires';
include '../ressources/views/layouts/head.tpl.php';
include '../ressources/views/layouts/header.tpl.php';
?>
<div class="d-flex cdiv-12 flex-row flex-wrap justify-content-around">
    <?php if (count($article) > 0) : ?>
        <div class="d-flex flex-column col-10 m-1">
            <a href="" class="ms-4 link-dark link-underline-opacity-0">
                <b class="border-bottom">
                    <?php echo $article[0]['title'] ?>
                </b>
            </a>
            <p class="ms-5 mb-0">
                <em><?php echo $article[0]['body'] ?></em>
            </p>
            <blockquote cite="">
                <p class="mb-0">
                    <?php echo $article[0]['longText'] ?>
                </p>
                <footer class="ms-2">
                    <em>By <a href="" class=""><u><?php echo $article[0]['pseudo'] ?></u></a> </em>
                </footer>
            </blockquote>
            <div class="d-flex flex-row justify-content-start">
                <a href="<?php echo "/index.php?action=blogPostModify&id=" . $article[0]['id']; ?>" class="ms-4 col-2 btn btn-dark">Modify this Article</a>
                <a href="<?php echo "/index.php?action=blogPostDelete&id=" . $article[0]['id']; ?>" class="ms-4 col-2 btn btn-dark">Delete this Article</a>
            </div>
        </div>
    <?php else : ?>
        <div>
            Aucun article avec l'identifiant <?php echo $article[0]['id'] ?>.
        </div>
    <?php endif; ?>
</div>
<div class="d-flex cdiv-12 flex-row flex-wrap justify-content-around ">
    <?php if (count($comments) > 0) : foreach ($comments as $comment) : ?>
            <div class="d-flex flex-column col-4 m-1 sur_image">
                <blockquote cite="">
                    <p class="mb-0">
                        <?php echo $comment['body'] ?>
                    </p>
                    <footer class="ms-2">
                        <em>By <a href="" class=""><u><?php echo $comment['pseudo'] ?></u></a> -- <?php echo $comment['date'] ?></em>
                    </footer>
                </blockquote>
            </div>
        <?php endforeach;
    else : ?>
        <div>
            Aucun commentaires pour le moment.
        </div>
    <?php endif; ?>
</div>

<?php
include '../ressources/views/layouts/footer.tpl.php';
