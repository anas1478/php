<?php 
require_once "inc/init.inc.php";
require_once "inc/haut.inc.php";
$resultat ="";
$content .= '<div class="row mx-lg-n5">
<ul class="list-group col-3">';
$resultat = executeRequete("SELECT categorie FROM produit GROUP BY categorie");
	
while($cat = $resultat->fetch(PDO::FETCH_ASSOC)){
	$content .= '<li class="list-group-item "><a class="text-info" href="?action=afficher&categorie=' . $cat["categorie"] . '">' . strtolower($cat["categorie"]) . '</a></li>';
}
$content .= '<li class="list-group-item"><a class="text-info" href="?action=afficher" >Voir tout</a></li></ul>';

$q = "SELECT id_produit,reference,titre,prix,stock,photo FROM produit";

if(isset($_GET['action']) && $_GET['action'] == "afficher" && $_GET['categorie'] == "T-SHIRT"){
	$q .= " WHERE categorie='T-SHIRT'";
}
if(isset($_GET['action']) && $_GET['action'] == "afficher" && $_GET['categorie'] == "ACCESSOIRES"){
	$q .= " WHERE categorie='ACCESSOIRES'";
}

$resultat = executeRequete($q);

$content .= '<div class="jumbotron col-9 row">';
if(isset($_GET['action']) && $_GET['action'] == "afficher"){
for($i = 0; $i < $resultat->rowCount(); $i++){
	$card = $resultat->fetch(PDO::FETCH_ASSOC);
	
	$content .= '<div class="card col-4" style="width: 18rem;">
					<img src="' . $card["photo"] . '" class="card-img-top" alt="' . $card["titre"] . '">
					<div class="card-body">
						<h5 class="card-title">' . $card["titre"] . '</h5>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Référence : ' . $card["reference"] . '</li>
						<li class="list-group-item">Stocks : ' . $card["stock"] . '</li>
						<li class="list-group-item">Prix : ' . $card["prix"] . '</li>
					</ul>
					<div class="card-body">
					<td><a class="text-info" href="' . RACINE_SITE . 'fiche_produit.php?id_produit=' . $card['id_produit'] . '">Voir le produit</a></td>
					</div>
				</div>';
	
	
}
$content .= '</div>';
}
$content = print $content;
require_once('inc/bas.inc.php');
?>

