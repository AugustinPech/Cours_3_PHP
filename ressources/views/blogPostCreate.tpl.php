<?php
$metatitle = 'Submit an article';
$metadescription = 'Formulaire pour créer un article';
include '../ressources/views/layouts/head.tpl.php';
include '../ressources/views/layouts/header.tpl.php';
$currentDate = date("Y-m-d");
?>

<main class="d-flex flex-row justify-content-center">
    <div class="d-flex flex-row justify-content-center text-primary">
        <?php if (isset($formulaire) && count($formulaire) > 0) {
            echo "Votre article est en cours de traitement.";
        }; ?>
    </div>
    <form class="col-8 d-flex flex-column justify-content-around  align-items-stretch" method="post" action="index.php?action=blogPostCreate">
        <label for="title">Titre du nouvel article :</label>
        <input type="text" name="title" id="title" placeholder="" size="32" maxlength="45" autofocus><br>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" placeholder="" size="32" maxlength="45" autofocus><br>
        <div class="d-flex flex-row justify-content-around">
            <div><label for="startDate">Date de publication souhaitée</label>
                <input type="date" name="startDate" id="startDate" value="<?php echo "$currentDate"; ?>" min="<?php echo "$currentDate"; ?>">
            </div>
            <div><label for="endDate">Date de retrait souhaitée</label>
                <input type="date" name="endDate" id="endDate" value="<?php echo $currentDate; ?>">
            </div>
        </div>
        <label for="body">Résumé de votre article :</label>
        <textarea name="body" id="body" style="width: 100%;" rows="2"></textarea><br>
        <div class="" id="fields">
            <label for="longText">Texte de votre article :</label>
            <textarea name="longText" id="longText" style="width: 100%;" rows="10"></textarea>
            <fieldset class="d-flex justify-content-end mb-3">
                <div id="submit">
                    <input type="submit" value="Submit">
                </div>
            </fieldset>
        </div>
    </form>
</main>

<?php
include '../ressources/views/layouts/footer.tpl.php';
