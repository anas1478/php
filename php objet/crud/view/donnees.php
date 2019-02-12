

<table  class="table table-dark">
    <thead><tr>
        <?php foreach($fields as $value):?>
        <th>
           <?=$value['Field']?></th>
       
<?php endforeach; ?>
</tr></thead>
    <?php foreach($donnees as $donnee): ?>

        <tr>
            <td><?=implode('</td><td>',$donnee)?></td>
        </tr>
<?php endforeach; ?>
</table>