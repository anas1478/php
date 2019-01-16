<?php

function executeRequete($req){
	global $bdd;

	$result = $bdd->query($req);
	if(!$result){
		die('Erreur sur la requete sql.<br>Message : ' . $bdd->error() . '<br>Code : ' . $req);
	}

	return $result;
}

function debug($d, $mode = 1){
	echo '<div class="alert alert-warning" role="alert">';
	$trace = debug_backtrace();
	echo "debug demandé dans le fichier " . $trace[0]['file'] . ' à la ligne ' . $trace[0]['line'];
	if($mode === 1){
		echo "<pre>" ; print_r($d) ; echo "</pre>";
	}else{
		var_dump($d);
	}
	echo "</div>";
}

function internauteEstConnecte(){
	if(!isset($_SESSION['membre'])) return false;
	else return true;
}

function internauteEstConnecteEtEstAdmin(){
	if(internauteEstConnecte() && $_SESSION['membre']['status'] == 1) return true;
	else return false;
}

function creationPanier(){

	if(!isset($_SESSION['panier'])){
		$_SESSION['panier'] = array();//titre, id, quantite, prix
		$_SESSION['panier']['titre'] = array();//titre de mes produits
		$_SESSION['panier']['id_produit'] = array();//id de mes produits
		$_SESSION['panier']['quantite'] = array();//quantite
		$_SESSION['panier']['prix'] = array();//prix
	}
	
}

function ajouterProduitDansPanier($titre,$id_produit,$quantite,$prix){
	
	creationPanier();
	$position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
	if($position_produit !== false){
		$_SESSION['panier']['quantite'][$position_produit] += $quantite;
	}else {
		$_SESSION['panier']['titre'][]= $titre;
		$_SESSION['panier']['id_produit'][]= $id_produit;
		$_SESSION['panier']['quantite'][]= $quantite;
		$_SESSION['panier']['prix'][]= $prix;
	}
	
}

function montantTotal(){
	$total = 0;

	for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
		$total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
	}

	return round($total,2);
}

function retirerProduitPanier($id_produit_a_supprimer){

	$position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
	if($position_produit !== false){
		array_splice($_SESSION['panier']['titre'], $position_produit, 1);
		array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
		array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
		array_splice($_SESSION['panier']['prix'], $position_produit, 1);
	}
	
}


