

<?php
//afficher les information du membre a traver les information enregitrer dans le fichier session,attention, si l'utilisateur n'estr pas connecté
//rediriger le vers la page de connection
require_once ('inc/init.inc.php');
if(internauteEstConnecte()||internauteEstConnecteEtEstAdmin()){
    echo"<div class='pseu'>";
    foreach ($_SESSION['membre'] as $key =>$value) {
     echo $key . ":" . $value. "<br>";
    }
    echo"</div>";
   // echo "bonjour ". $_SESSION['membre']['pseudo'];
}else{
    header('location: connexion.php');
}
require_once ('inc/haut.inc.php');
require_once ('inc/bas.inc.php');
?>
