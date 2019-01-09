<?php

try {
    $bdd = new PDO("mysql:host=localhost;dbname=site;charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

session_start();


//chemin
define("RACINE_SITE","/supports_poissy/php/site/");
//variable content
$content="";

require_once('fonction.inc.php');

?>
