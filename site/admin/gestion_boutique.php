<?php 

 require_once('../inc/init.inc.php'); 
 require_once('../inc/haut.inc.php');
 
 if(!internauteEstConnecteEtEstAdmin()) header("location:../connexion.php");//je bloque l'accès à tous les utilisateurs qui ne sont pas admin en les redirigeant vers la page connexion


//suppression du produit, je la definie ici mais elle est appelée plus bas , avec le code:  $content .='<td><a href="?action=suppression&id_produit=' .$ligne['id_produit'] . '" onClick="return(confirm("Etes-vous certain ?"))">Suppression</a></td>';
if(isset($_GET['action']) && $_GET['action']== "suppression"){//si l'action est definie et s'il s'agit d'une action de suppression, alors:
   $resultat= executeRequete("SELECT * FROM produit WHERE id_produit = $_GET[id_produit] ");
   $produit_a_supprimer= $resultat->fetch(PDO::FETCH_ASSOC);
   $chemin_photo_produit_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo'];


   //s'il existe un chemin, donc que le dossier existe, je detache le chemin de la photo avec unlink
   if(!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_produit_a_supprimer)){
     unlink($chemin_photo_produit_a_supprimer);
   }

   executeRequete("DELETE FROM produit WHERE id_produit = $_GET[id_produit]");
   $content .='<div class="alert alert-success" role="alert">Votre produit a bien été supprimé</div>';
   $_GET['action'] = "affichage";//dès que l'action est faite je passe a l'affichage
}


 //j'enregistre mes produits dans ma bdd et je gere les photos 
 if($_POST){
    //  debug($_POST);
     $photo_bdd="";

//pour l'action modification: si une action existe et qu'elle se nomme modification, alors
  if(isset($_GET['action']) && $_GET['action'] == "modification"){
    $photo_bdd= $_POST['photo_actuelle'];
  }


     if(!empty($_FILES['photo']['name'])){//si $_FILES n'est pas vide alors:
        //  debug($_FILES);
         $nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];//on modifie le nom de la photo lorsque qu'on la charge
         $photo_bdd = RACINE_SITE . "photo/$nom_photo";//j'enregistre le chemin du dossier contenant les photos dans cette variable $photo_bdd
         $photo_dossier = $_SERVER['DOCUMENT_ROOT']. RACINE_SITE . "photo/$nom_photo";
         copy($_FILES['photo']['tmp_name'], $photo_dossier);
     }

     foreach($_POST as $key=>$value){
         $_POST[$key] = htmlspecialchars(addslashes($value));//je securise mes valeurs
     }

     executeRequete("REPLACE INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES ('$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[description]', '$_POST[couleur]', '$_POST[taille]', '$_POST[public]', '$photo_bdd', '$_POST[prix]', '$_POST[stock]')");//le replace ajoute un produit s'il n'existe pas ou modifie l'article s'il existe deja et qu'on souhaite le modifier

     $content .='<div class="alert alert-success" role="alert">Félicitations votre produit a bien été ajouté ! </div>';
 }
//$_FILES permet de recuperer les infos d'un fichier
     $content .='<a href="?action=affichage">Afficher le produit </a>';
     $content .='<a href="?action=ajout"> Ajouter un produit</a>';

     if(isset($_GET['action']) && $_GET['action'] == "affichage"){
         $resultat =executeRequete("SELECT * FROM produit");

         $content .="<h2>Affichage des produits</h2>";
         $content .="Nombre de produit(s) dans la boutique" . " : " .$resultat->rowCount();
         $content .='<table class="table"><thead><tr>';

         for($i = 0; $i <$resultat->columnCount(); $i++){
             $colonne =$resultat->getColumnMeta($i);
             $content .='<th scope="col">' . $colonne['name'] . '</th>';//name correspond aux champs de la table produit
         }//je recupere les colonnes

         $content .='<th scope="col">Modification</th>';
         $content .='<th scope="col">Suppression</th>';
         $content .='</thead></tr>';



         //cette partie gere l'affichage des photos
         $content .='<tbody>';
         while($ligne =$resultat->fetch(PDO::FETCH_ASSOC)){//je parcours chaque ligne de mon tableau avec fetch et en ayant le nom des index avec fetch_assoc
             $content .='<tr>';
             foreach($ligne as $key => $value) {
                 if($key == "photo"){
                     $content .= '<td><img src="' .$value . '"width="70" height="70"></td>';
                 }
                 else {
                     $content .='<td>' . $value . '</td>';
                 }
             }

             $content .= '<td><a href="?action=modification&id_produit=' .$ligne['id_produit'] . '">Modification</a></td>';
             $content .='<td><a href="?action=suppression&id_produit=' .$ligne['id_produit'] . '" onClick="return(confirm("Etes-vous certain ?"))">Suppression</a></td>';
         }
     }

     //ajout ou modification de produit:
     if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action']=="modification")){
      if(isset($_GET['id_produit'])){
        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = $_GET[id_produit]");
        $produit_actuel=$resultat->fetch(PDO::FETCH_ASSOC);
      }
     }
?>


<form method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="id_produit" value="<?php if(isset($produit_actuel['id_produit'])) echo $produit_actuel['id_produit'] ?>">
  <div class="form-group">
    <label for="reference">Référence produit</label>
    <input type="text" class="form-control" id="reference du produit" placeholder="reference" name="reference"  value="<?php if(isset($produit_actuel['reference'])) echo $produit_actuel['reference'] ?>">
  </div>

  <div class="form-group">
  <label for="categorie">Catégorie</label>
    <input type="text" class="form-control" id="categorie du produit" placeholder="categorie" name="categorie" value="<?php if(isset($produit_actuel['categorie'])) echo $produit_actuel['categorie'] ?>">
  </div>

  <div class="form-group">
  <label for="titre">Titre</label>
    <input type="text" class="form-control" id="titre" placeholder="titre du produit" name="titre" value="<?php if(isset($produit_actuel['titre'])) echo $produit_actuel['titre'] ?>">
  </div>

  <div class="form-group">
  <label for="description">Description</label>
    <input type="text" class="form-control" id="description" placeholder="description du produit" name="description" value="<?php if(isset($produit_actuel['description'])) echo $produit_actuel['description'] ?>">
  </div>

  <div class="form-group">
  <label for="couleur">Couleur</label>
    <input type="text" class="form-control" id="couleur" placeholder="couleur du produit" name="couleur" value="<?php if(isset($produit_actuel['couleur'])) echo $produit_actuel['couleur'] ?>">
  </div>

  <div class="form-group">
    <label for="taille">Taille</label>
    <select class="form-control" id="taille" name="taille" >
      <option value="s" <?php if(isset($produit_actuel)&& $produit_actuel['taille']=='s') echo "selected"  ?>>S</option>
      <option value="m"<?php if(isset($produit_actuel)&& $produit_actuel['taille']=='m') echo "selected"  ?>>M</option>
      <option value="l" <?php if(isset($produit_actuel)&& $produit_actuel['taille']=='l') echo "selected"  ?>>L</option>
      <option value="xl" <?php if(isset($produit_actuel)&& $produit_actuel['taille']=='xl') echo "selected"  ?>>XL</option>
    </select>
  </div>

  <div class="form-group">
    <label for="public">Public :</label><br>
    <input type="radio" name="public" id="public" value="m" <?php if(isset($produit_actuel)&& $produit_actuel['public']=='m') echo "checked"  ?>>Homme<br>
    <input type="radio" name="public" id="public" value="f" <?php if(isset($produit_actuel)&& $produit_actuel['public']=='f') echo "checked"  ?>>Femme<br>
    <input type="radio" name="public" id="public" value="mixte" <?php if(isset($produit_actuel)&& $produit_actuel['public']=='mixte') echo "checked"  ?>>Mixte<br>
  </div>

  <div class="form-group">
    <label for="photo">Photos</label>
    <input type="file" name="photo" id="photo">
    <?php 
      if(isset($produit_actuel)){
        echo "<i>Vous pouvez uploader une nouvelle photo si vous le désirez</i><br>";
        echo '<img src="' .$produit_actuel['photo'].'"width=90 height=90><br>';
        echo '<input type="hidden" name="photo_actuelle" value="' .$produit_actuel['photo'] .'"><br>';

    }
    ?>
  </div> 

  <div class="form-group">
    <label for="prix">Prix</label>
    <input type="text" name="prix" id="prix" placeholder="prix du produit" value="<?php if(isset($produit_actuel['prix'])) echo $produit_actuel['prix'] ?>">
  </div>  

  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="stock" name="stock" id="stock" placeholder="stock" value="<?php if(isset($produit_actuel['stock'])) echo $produit_actuel['stock'] ?>">
  </div>  
    <div class="form-group">
    <button type="submit" class="btn btn-primary"><?php echo ucfirst($_GET['action']); ?></button> 
</form>
<?php  echo $content; ?>
<?php require_once('../inc/bas.inc.php'); ?>