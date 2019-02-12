<?php

//var_dump($donnees);

?>

<br>

<div><a href="?op=add" class="btn btn-info btn-large"><i class="fas fa-plus"></i> Ajouter une nouvelle donnée</a></div>

<br>

<!-- Faites en sorte d'avoir 3 colonnes en plus :
        1 - voir le détail de l'employé
        2 - modifier
        3 - supprimer
 -->
<table class="table table-bordered text-center table-striped table-dark">
    <thead class="thead bg-info"><tr>
        <th>ID</th> <!--A cause du array_splice permettant de ne pas afficher le champs idEmploye dans le formulaire d'ajout, on déclare manuellement un entête, sinon décalage -->
    <?php
        foreach($fields as $value):
    ?>
        <th><?= $value['Field'] ?></th>
    <?php
        endforeach;
    ?>
    <th>Voir</th>
    <th>Modifier</th>
    <th>Supprimer</th>
    </tr></thead>
    <?php
        foreach($donnees as $value):
        //echo "<pre>", print_r($value); echo "</pre>";
        // $value possède un tableau ARRAY avec les données d'un employé par tour de boucle
        // implode() permet d'extraire les données de chaque tableau ARRAY par employé
    ?>
    <tr>
        <td><?= implode('</td><td>', $value) ?></td>
        <td><a href="?op=select&id=<?= $value[$id] ?>" class="text-light"><i class="fas fa-info-circle"></i></a></td>
        <td><a href="?op=update&id=<?= $value[$id] ?>" class="text-light"><i class="fas fa-user-edit"></i></a></td>
        <td><a href="?op=delete&id=<?= $value[$id] ?>" class="text-light"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    </tr>
    <?php
        endforeach;
    ?>

</table>