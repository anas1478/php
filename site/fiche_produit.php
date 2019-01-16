<?php
require_once('inc/init.inc.php');


$resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'");

if($resultat->rowCount() <= 0) { header('location:boutique.php'); exit();}


$produit = $resultat->fetch(PDO::FETCH_ASSOC);
$content .= "<h2>" . $produit['titre'] . "</h2>";
$content .= "<p>Catégorie : " . $produit['categorie'] . "</p>";
$content .= "<p>Taille : " . $produit['taille'] . "</p>";
$content .= "<p>Couleur : " . $produit['couleur'] . "</p>";
$content .= '<p><img src="' . $produit['photo'] . '" width="70" height="70">' . "</p>";
$content .= "<p><i>Description : " . $produit['description'] . "</i></p>";

if($produit['stock'] > 0){
	$content .= "<p><i>Nombre produit disponible : " . $produit['stock'] . "</i></p>";
	$content .= "<form method='post' action='panier.php'>";
	$content .= '<input type="hidden" name="id_produit" value="'.$produit['id_produit'].'">';
	$content .= "<label for='quantite'>Quantite : </label>";
	$content .= '<select id="quantite" name="quantite">';
	$quantite = $produit['stock'];
	for($i = 1; $i <= $quantite; $i++)
	{
		$content .= "<option>" . $i . "</option>";
	}
	$content .= "</select>";
	$content .= "<input type='submit' name='ajouter_panier' value='Ajouter au panier'><br>";
	$content .= "</form>";
} else {
	$content .= "Rupture de stock !";
}

$content .= '<a href="boutique.php?categorie='.$produit['categorie'].'">Retour vers la séléction de ' . $produit['categorie'] .'</a>';



require_once('inc/haut.inc.php');

echo $content;

require_once('inc/bas.inc.php');



