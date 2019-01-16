<?php

require_once("inc/init.inc.php");

//AJOUTER ARTICLES DANS NOTRE VARIABLE SESSION PANIER
if(isset($_POST['ajouter_panier']))
{
	$resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_POST[id_produit]'");
	$produit = $resultat->fetch(PDO::FETCH_ASSOC);
	ajouterProduitDansPanier($produit['titre'], $_POST['id_produit'], $_POST['quantite'], $produit['prix']);
}


//VIDER PANIER
if(isset($_GET['action']) && $_GET['action'] == "vider"){
		unset($_SESSION['panier']);
}


//ACTION DE PAYER
if(isset($_POST['payer']))
{
	for ($i=0; $i < count($_SESSION['panier']['id_produit']); $i++) { 
		$resultat = executeRequete("SELECT * FROM produit WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i]);
		$produit = $resultat->fetch(PDO::FETCH_ASSOC);

		//CONTROLE DES STOCKS
		if($produit['stock'] < $_SESSION['panier']['quantite'][$i])
		{
			$content .= '<div class="alert alert-warning role="alert">Stock restant : ' . $produit['stock'] . '</div>';
			$content .= '<div class="alert alert-warning role="alert">Quantité demandée : ' . $_SESSION['panier']['quantite'][$i] . '</div>';
			if($produit['stock'] > 0){
				$_SESSION['panier']['quantite'][$i] = $produit['stock'];
				$content .= '<div class="alert alert-warning role="alert">la quantité du produit : ' . $_SESSION['panier']['id_produit'][$i] . ' a été réduite car notre stock était insuffisant, veuillez vérifier vos achats</div>';
			}
			else {
				$content .= '<div class="alert alert-danger role="alert">Le produit : ' . $_SESSION['panier']['id_produit'][$i] . ' a été retiré de votre panier car nous sommes en rupture de stock, veuilez verifier vos achats</div>';
				retirerProduitPanier($_SESSION['panier']['id_produit'][$i]);
				$i--;
			}
			$erreur = true;
		}
	}


	//SI L'ACHAT SE PASSE SANS ERREUR (disponible, utilisateur connecté etc.)
	if(!isset($erreur)){
		executeRequete("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES ('".$_SESSION['membre']['id_membre']. "','" . montantTotal() . "', NOW())");

		//lastInsertId() ---> Retourne l'identifiant de la dernière ligne insérée ou la valeur d'une séquence
		$id_commande = $bdd->lastInsertId();
		for ($i=0; $i < count($_SESSION['panier']['id_produit']) ; $i++) { 
			executeRequete('INSERT INTO details_commande (id_commande,id_produit, quantite,prix) VALUES("'. $id_commande . '","'. $_SESSION['panier']['id_produit'][$i].'","' .$_SESSION['panier']['quantite'][$i] . '","' . $_SESSION['panier']['prix'][$i] .'")');

			//ON MET A JOUR LES STOCKS DISPONIBLE
			executeRequete('UPDATE produit SET stock = stock - "' . $_SESSION['panier']['quantite'][$i] . '" WHERE id_produit = "' . $_SESSION['panier']['id_produit'][$i] . '"');
		}


		//ON VIDE LE PANIER APRES AVOIR VALIDER SON ACHAT
		unset($_SESSION['panier']);

		$content .= '<div class="alert alert-success role="alert">Merci pour votre commande, votre n° de suivi est le : '. $id_commande .'</div>';
	}
}


//AFFICHAGE HTML
require_once("inc/haut.inc.php");

echo $content;
echo '<table border="1" style="border-collapse: collapse" cellpadding="7">';
echo '<tr><td colspan="5">Panier</td></tr>';
echo '<tr><th>Titre</th><th>Produit</th><th>Quantité</th><th>Prix</th></tr>';
if(empty($_SESSION['panier']['id_produit'])){
	echo '<tr><td colspan="5">Votre panier est vide</td></tr>';
} else {
		for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
			echo '<tr>';
			echo '<td>' . $_SESSION['panier']['titre'][$i] . '</td>';
			echo '<td>' . $_SESSION['panier']['id_produit'][$i] . '</td>';
			echo '<td>' . $_SESSION['panier']['quantite'][$i] . '</td>';
			echo '<td>' . $_SESSION['panier']['prix'][$i] . '</td>';
			echo '</tr>';
		}

		echo "<tr><th colspan='3'>Total</th><td colspan='2'>" . montantTotal() . " euros</td></tr>";

		if(internauteEstConnecte()){
			echo '<form method="post" action="">';
			echo '<tr><td colspan="5"><input type="submit" name="payer" value="valider mon paiement"></td></tr>';
			echo '</form>';
		} else {
			echo '<tr><td colspan="3">Veuillez vous inscrire ou vous connecter afin de finaliser votre paiement</td></tr>';
		}

		echo '<tr><td calspan="5"><a href="?action=vider">Vider mon panier</a></td></tr>';
}

echo "</table><br>";

echo "<i>Règlement par chèque uniquement à l'adresse suivante : 300 rue de la maladrerie 78300 Poissy</i><br>";

echo "<hr>session panier.php : <br>"; debug($_SESSION);

require_once('inc/bas.inc.php');

