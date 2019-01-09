<?php

require_once('../inc/init.inc.php');
require_once('../inc/haut.inc.php');

if(!internauteEstConnecteEtEstAdmin()) header("location:../connexion.php");

if($_POST){
	//debug($_POST);
	$photo_bdd="";
	if(!empty($_FILES['photo']['name'])){
		//debug($_FILES);
		$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
		$photo_bdd = RACINE_SITE . "photo/$nom_photo";
		$photo_dossier = $_SERVER['DOCUMENT_ROOT']. RACINE_SITE . "photo/$nom_photo";
		copy($_FILES['photo']['tmp_name'], $photo_dossier);
	}

	foreach ($_POST as $key => $value) {
		$_POST[$key] = htmlspecialchars(addslashes($value));
	}

	executeRequete("INSERT INTO produit(reference,categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES('$_POST[reference]','$_POST[categorie]','$_POST[titre]','$_POST[description]','$_POST[couleur]','$_POST[taille]','$_POST[public]','$photo_bdd','$_POST[prix]', '$_POST[stock]')");

	$content .= '<div class="alert alert-success" role="alert">Félicitation votre produit a bien été ajouté !</div>';
}

$content .= '<a href="?action=affichage">Afficher les produits</a>';
$content .= '<a href="?action=ajout">Ajouter un produit</a>';

if(isset($_GET['action']) && $_GET['action'] == "affichage")
{
	$resultat = executeRequete("SELECT * FROM produit");

	$content .= "<h2>Affichage des produits</h2>";
	$content .= "Nombre de produit(s) dans la boutique" . $resultat->rowCount();

	$content .= '<table class="table"><thead><tr>';
	for($i = 0 ; $i < $resultat->columnCount() ; $i++){

		$colonne = $resultat->getColumnMeta($i);
		$content .= '<th scope="col">' . $colonne['name'] . '</th>';
	}

	$content .= '<th scope="col">Modification</th>';
	$content .= '<th scope="col">Suppression</th>';
	$content .= "</thead></tr>";

	$content .= "<tbody>";
	while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
		$content .= '<tr>';
		foreach ($ligne as $key => $value) {
			if($key == "photo"){
				$content .= '<td><img src="' . $value . '"width="70" height="70"></td>';
			}
			else {
				$content .= '<td>' . $value . '</td>';
			}
		}

		$content .= '<td><a href="?action=modification&id_produit=' . $ligne['id_produit'] . '">Modification</a></td>';
		$content .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_produit'] . '" onClick="return(confirm(\'Etes vous certain ?\'));">Suppression</a></td>';
		$content .= "</tr>";
	}
	$content .= "</tbody></table>";

}

?>

<div class="container-fluid">
	<form method="post" enctype="multipart/form-data" action="">
<?php echo $content ?>
  <div class="form-group">
    <label for="reference">Reference Produit</label>
    <input type="text" class="form-control" id="reference" placeholder="la référence du produit" name="reference">
  </div>
  <div class="form-group">
    <label for="categorie">Catégorie</label>
    <input type="text" class="form-control" id="categorie" placeholder="la categorie du produit" name="categorie">
  </div>
  <div class="form-group">
    <label for="titre">Titre du produit</label>
    <input type="text" class="form-control" id="titre" placeholder="le titre du produit" name="titre">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="couleur">Couleur</label>
    <input type="text" class="form-control" id="couleur" placeholder="la couleur du produit" name="couleur">
  </div>
  <div class="form-group">
    <label for="taille">Taille</label>
    <select class="form-control" id="taille" name="taille">
      <option value="s">S</option>
      <option value="m">M</option>
      <option value="l">L</option>
      <option value="xl">XL</option>
    </select>
  </div>
  <div class="form-group">
    <label for="public">Sexe</label><br>
   	<input type="radio" id="pubic" name="public" value="m">Homme<br>
   	<input type="radio" id="public" name="public" value="f">Femme<br>
   	<input type="radio" id="public" name="public" value="mixte">Mixte<br>
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" id="photo" name="photo">
  </div>
  <div class="form-group">
    <label for="prix">Prix</label>
    <input type="text" id="prix" name="prix" placeholder="prix du produit">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" placeholder="stock du produit">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

</div>

<?php require_once('../inc/bas.inc.php'); ?>