<?php
//conexion à la BDD
try{
	$bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exeption $e){
	die('Erreur : ' . $e->getMessage());
};

//session
session_start();

//chemin
define("RACINE_SITE", "/supports_poissy/php/site/");

//variable content
$content ="";

//autres fichier d'inclusions
require_once("fonction.inc.php");
?>