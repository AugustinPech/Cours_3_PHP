<?php
$metatitle = 'Submit an article';
$metadescription = 'Formulaire pour créer un article';
include '../ressources/views/layouts/head.tpl.php';
include '../ressources/views/layouts/header.tpl.php';
$currentDate = date("Y-m-d");
?>

<main class="d-flex flex-column justify-content-center align-items-center">
    <div class="d-flex flex-row justify-content-center text-primary">
        <?php if (isset($formulaire) && count($formulaire) > 0) {
            echo "Votre article est en cours de traitement. <br>";
        }; ?>
    </div>
    <form class="col-8 d-flex flex-column justify-content-around  align-items-stretch" method="post" action="index.php?action=blogPostCreate">

        <label for="title">Titre du nouvel article :</label>
        <input type="text" name="title" id="title" placeholder="" size="32" maxlength="45" autofocus><br>

        <div class="d-flex flex-row justify-content-around">

            <div><label for="id">Pseudo :</label>

            <select name="id" id="id" class="form-select" aria-label="">
                <option name="id" id="id" value="0" selected>Publier anonymement</option>
                <?php foreach ($allAuthors as $author) : ?>
                    <option name="id" id="id" value="<?php echo $author['id']; ?>"> Publier en tant que <?php echo $author['pseudo']; ?></option>
                <?php endforeach; ?>
            </select></div>
            <div><label for="startDate">Date de publication souhaitée</label>
                <div><input type="date" name="startDate" id="startDate" value="<?php echo "$currentDate"; ?>" min="<?php echo "$currentDate"; ?>"></div>
            </div>
            <div><label for="endDate">Date de retrait souhaitée</label>
                <div><input type="date" name="endDate" id="endDate" value="<?php echo $currentDate; ?>"></div>
            </div>
        </div><br>
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
