<?php ob_start() ?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="nomCharacter">Nom du personnage</label>
    <input type="text" name="nomCharacter">
    <label for="imageCharacter">image</label>
    <input type="file" name="imageCharacter">
    <input type="submit" value="Ajouter" name="submit">
</form>

<p><?= $error ?></p>
<?php $content = ob_get_clean() ?>