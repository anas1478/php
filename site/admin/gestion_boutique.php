<?php 
require_once "../inc/init.inc.php";
require_once "../inc/haut.inc.php";

if(!internauteEstConnecteEtEstAdmin()) header("location:../connexion.php");

//Suppression des produits
if(isset($_GET['action']) &&$_GET['action'] == "suppression"){
	$resultat = executeRequete("SELECT * FROM produit WHERE id_produit = $_GET[id_produit]");
	$produit_a_supprimer = $resultat->$_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo'];

	if(!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_produit_a_supprimer['photo'])){
		unlink($chemin-photo_produit_a_supprimer);
	}

	executeRequete("DELETE FROM produit WHERE id_produit = $_GET[id_produit]");
	$content .= '<div class="alert alert-success" role="alert"> Votre article à bien été supprimé</div>';
	$_GET['action'] = "affichage";
}

if($_POST){
	// debug($photo_bdd);
	$photo_bdd="";

	if(isset($_GET['action']) &&$_GET['action'] == "modification"){
		$photo_bdd = $_POST['photo_actuelle'];
	}

	if(!empty($_FILES['photo']['name'])){
		debug($_FILES);
		$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
		$photo_bdd = RACINE_SITE . "photo/$nom_photo";
		$photo_dossier = $_SERVER['DOCUMENT_ROOT']. RACINE_SITE . "photo/$nom_photo";
		copy($_FILES['photo']['tmp_name'], $photo_dossier);
	}
	foreach ($_POST as $key => $value){
		$_POST[$key] = htmlspecialchars(addslashes($value));
	}
	
	executeRequete("REPLACE INTO produit (reference,categorie,titre,description,couleur,taille,public,photo,prix,stock) VALUES('$_POST[reference]','$_POST[categorie]','$_POST[titre]','$_POST[description]','$_POST[couleur]','$_POST[taille]','$_POST[public]','$photo_bdd','$_POST[prix]','$_POST[stock]')");
	
	$content .=  '<div class="alert alert-success" role="alert"> Votre article à bien été ajouté</div>';
}

$content .= '<a href="?action=affichage">Affichage des produits</a><br />';
$content .= '<a href="?action=ajout">Ajouter des produits</a><br />';

//affichage du tableau
if(isset($_GET['action']) && $_GET['action'] == "affichage"){
	$resultat = executeRequete("SELECT * FROM produit");
	$content .="<h2>Affichage des produits</h2>";
	$content .="Nombre de produits(s) dans la boutique " . $resultat->rowCount();
	$content .='<table class="table"><thead><tr>';

	for($i = 0; $i < $resultat->columnCount(); $i++){
		$colonne = $resultat->getColumnMeta($i);
		$content .= '<th scope="col">' . $colonne["name"] . '</th>';
	}

	$content .= '<th scope="col">Modifications</th>';
	$content .= '<th scope="col">Supression</th>';
	$content .= '<tbody>';

	while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
		$content .= '<tbody><tr>';
		foreach($ligne as $key => $value){
			if($key == "photo"){
				$content .= '<td><img src="' . $value . '" width="70" height="70"></td>';
			}else{
				$content .= '<td>' . $value . '</td>';
			}
		}
		$content .= '<td><a href="?action=modification&id_produit=' . $ligne['id_produit'] . '">Modification</a></td>';
		$content .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_produit'] . '" OnClick="return(confirm("Etes vous sûr de vouloir supprimer cet élément?")">Suppression</a></td>';
		$content .= '</tr>';
	}
	$content .= "</tbody></table>";
}

if(isset($_GET['action']) && ($_GET['action'] == "ajout" || $_GET['action'] =="modification")){
	if(isset($_GET['id_produit'])){
		$resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'");
		$produit_actuel = $resultat-> fetch(PDO::FETCH_ASSOC);
	}
}
?>
<form method="post" enctype="multipart/form-data" action="">
<?php echo $content; ?>
<input type="hidden" class="form-control" id="categorie" placeholder="la catégorie du produit" name="id_produit" value="<?php if(isset($produit_actuel['id_produit'])){ echo $produit_actuel['id_produit'];} ?>">
    <div class="form-group">
    	<label for="reference">Référence Produit</label>
    	<input type="text" class="form-control"  placeholder="la référence du produit" name="reference" value="<?php if(isset($produit_actuel['reference'])){ echo $produit_actuel['reference'];} ?>">
  	</div>
  	<div class="form-group">
    	<label for="categorie">Catégorie</label>
    	<input type="text" class="form-control"  placeholder="la catégorie du produit" name="categorie" value="<?php if(isset($produit_actuel['categorie'])){ echo $produit_actuel['categorie'];} ?>">
  	</div>
  	<div class="form-group">
    	<label for="titre">Titre du produit</label>
    	<input type="text" class="form-control"  placeholder="le titre du produit" name="titre" value="<?php if(isset($produit_actuel['titre'])){ echo $produit_actuel['titre'];} ?>">
  	</div>
  	<div class="form-group">
    	<label for="description">Description du produit</label>
    	<input type="text" class="form-control" placeholder="la description du produit" name="description" value="<?php if(isset($produit_actuel['description'])){ echo $produit_actuel['description'];} ?>">
  	</div>
	  <div class="form-group">
	    <label for="couleur">Couleur</label>
	    <input type="text"  class="form-control" placeholder="la couleur du produit" name="couleur" value="<?php if(isset($produit_actuel['couleur'])){ echo $produit_actuel['couleur'];} ?>">
	</div>
	<div class="form-group"> 
		<label for="exampleFormControlSelect1">Taille</label> 
		<select class="form-control" id="taille" name="taille"> 
			<option value="<?php if(isset($produit_actuel['taille'])){ echo $produit_actuel['taille'] == "s";} ?>">Small</option> 
			<option value="<?php if(isset($produit_actuel['taille'])){ echo $produit_actuel['taille'] == "m";} ?>">Medium</option> 
			<option value="<?php if(isset($produit_actuel['taille'])){ echo $produit_actuel['taille'] == "l";} ?>">Large</option> 
			<option value="<?php if(isset($produit_actuel['taille'])){ echo $produit_actuel['taille'] == "xl";} ?>">XLarge</option> 
		</select> 
	</div> 
	<div class="form-group"> 
		<label for="public">Sexe</label>
		<?php debug($produit_actuel) ;?>
			<input type="radio" name="public" value="<?php if(isset($produit_actuel['public'])){ echo $produit_actuel['public'] == "m";} ?>">Homme<br> 
			<input type="radio" name="public" value="<?php if(isset($produit_actuel['public'])){ echo $produit_actuel['public'] == "f";} ?>">Femme<br>
			<input type="radio" name="public" value="<?php if(isset($produit_actuel['public'])){ echo $produit_actuel['public'] == "mixte";} ?>">Unisexe<br>
	</div> 
	<div class="form-group"> 
		<label for="photo">Photo</label> 
		<input type="file" id="photo" name="photo">
		<?php 
			if(isset($produit_actuel)){ 
				echo "<i> Vous pouvez uploader une nouvelle photo si vous le désirez</i><br />";
				echo "<i> Vous pouvez uploader une nouvelle photo si vous le désirez</i><br />";
				echo '<input type="hidden" name="photo_actuel" value="' . $produit_actuel['photo'] . '"<br />';
			}
		?>
	</div> 
	<div class="form-group"> 
		<label for="prix">Prix</label> 
		<input type="text" name="prix" placeholder="Prix du produit" value="<?php if(isset($produit_actuel['prix'])){ echo $produit_actuel['prix'];} ?>"> 
	</div> 
	<div class="form-group"> 
		<label for="stock">Stock</label> 
		<input type="text" name="stock" placeholder="Stock du produit" value="<?php if(isset($produit_actuel['stock'])){ echo $produit_actuel['stock'];} ?>"> 
	</div> 
	<button type="submit" class="btn btn-text"> <?php echo ucfirst($_GET['action']); ?></button> 
</form>

<?php
 require_once('../inc/bas.inc.php');
?>