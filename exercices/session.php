<?php

/* Une session qu'est ce c'est ? C'est un systeme mis en oeuvre dans le code PHP,permettant de conserver sur le serveur, dans un fichier temporaire, des informations.

Avantage ? Les données enregistrées dans un fichier sur le serveur disponible et consultable par toutes les pages durant la navigation de l'internaute.

A quoi ça sert ? Les sessions PHP nous permettent de conserver des informations sur un internaute côté serveur. Sans ce mecanisme on ne pourrait pas connecter un internaute a notre site web et maintenir sa connexion durant la navigation (de page en page).

/ Comment ça marche ?
- Creer 1 fichier de session
- Lire 1 fichier de session existant
Pour lire ou creer un fichier de session on utilise la methode prédéfinie session_start()
*/

session_start();
// Pour résumer session_start() permet de créer un fichier de session (ou de l'ouvrir s'il existe déjà) mais aussi de créer un cookie (ou s'il existe deja de le relier à un fichier de session deja existant).
// Il faut toujours utiliser session_start() et le placer au plus haut de la page.

$_SESSION['pseudo'] = 'kirikou';
$_SESSION['mdp'] = "supercool";

echo "<pre>", print_r($_SESSION); echo "</pre>";
unset($_SESSION['mdp']);
echo "<pre>", print_r($_SESSION); echo "</pre>";
//unset c est pour vider  un fichier
session_destroy();

?>