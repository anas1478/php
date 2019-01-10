<?php
require_once "inc/init.inc.php";
require_once "inc/haut.inc.php";

$res = executeRequete("SELECT * FROM produit");

if($res->rowCount()) {
    echo "<div class='d-flex row justify-content-center'>";
    while($r = $res->fetch()) {
        echo '
        <div class="card col-4 m-5" style="width: 18rem;">
        <img src="'.$r['photo'].'" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">'.$r['titre'].'</h5>
        <p class="card-text">'.$r['description'].'</p>
        <p class="card-text">'.$r['prix'].'€</p>
        <a href="fiche_produit.php?id_produit='.$r['id_produit'].
        '">voir la fiche </a>
        </div>
        </div>
        ';
    }
    echo "</div>";
}

?>


<?php 
require_once "inc/bas.inc.php";
?>