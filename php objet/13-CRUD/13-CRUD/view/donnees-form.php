<?php
//echo "<pre>"; print_r($fields); echo "</pre>";
// on passe en revue les champs récupérés via le Controller, et on créé un champ par tour de boucle, en fonction de la table 'employe'
?>

<form method="post" action="">
    <?php foreach($fields as $value): ?>
        <div class="form-group text-center">
        <div class="col-md-2 alert alert-info"><label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label></div>
            <input type="text" class="form-control" id="<?= $value['Field'] ?>" name="<?= $value['Field'] ?>" placeholder="Entrer <?= $value['Field'] ?>">
        </div>
    <?php endforeach; ?>
    <input type="submit" class="col-md-12 btn btn-info">
</form>