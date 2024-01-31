<?php 

$metatitle = "Modifier l'article n°".$article[0]['id']." - ".$article[0]['title'];
$metadescription = "Formulaire permettant de modifier l'article";
include '../ressources/views/layouts/head.tpl.php';
include '../ressources/views/layouts/header.tpl.php';
?>


<main class="d-flex flex-column justify-content-center align-items-center">
    <div class="d-flex flex-row justify-content-center text-primary">
        <?php if (isset($formulaire) && count($formulaire) > 0) {
            echo "Votre modification est en cours de traitement. <br>";
        }; ?>
    </div>
    <form class="col-8 d-flex flex-column justify-content-around  align-items-stretch" method="post" action="index.php?action=blogPostModify&id=<?php echo $article[0]['id']?>">
        <label for="title">Titre actuel de l'article :</label>
        <input type="text" name="title" id="title" value="<?php echo $article[0]['title'];?>" placeholder="" size="32" maxlength="45" autofocus><br>
        <div class="d-flex flex-row justify-content-around">
            <div><label for="startDate">Date de publication souhaitée</label>
                <input type="date" value="<?php echo $article[0]['startDate'];?>" name="startDate" id="startDate">
            </div>
            <div><label for="endDate">Date de retrait souhaitée</label>
                <input type="date" name="endDate" id="endDate" value="<?php echo $article[0]['endDate'];?>">
            </div>
        </div><br>
        <label for="body">Résumé de votre article :</label>
        <textarea name="body" id="body" style="width: 100%;" rows="2"><?php echo $article[0]['body'];?></textarea><br>
        <div class="" id="fields">
            <label for="longText">Texte de votre article :</label>
            <textarea name="longText" id="longText" style="width: 100%;" rows="10"><?php echo $article[0]['longText'];?></textarea>
            <fieldset class="d-flex justify-content-center m-3">
                <div id="submit">
                    <input type="submit" value="Submit">
                </div>
            </fieldset>
        </div>
    </form>
</main>

<?php
include '../ressources/views/layouts/footer.tpl.php';