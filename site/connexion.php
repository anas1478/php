<?php 
require_once "inc/init.inc.php";
require_once "inc/haut.inc.php";

if(internauteEstConnecte()) header("location:profil.php");
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
	session_destroy();
};


if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    $requete = executeRequete("SELECT * from membre where pseudo='$_POST[pseudo]' AND mdp=MD5('$_POST[mdp]')");
 
$membre = $requete->fetch(PDO::FETCH_ASSOC);

    if($requete->rowCount() > 0) {
		foreach ($membre as $key => $value){
			if($key != 'mdp'){
				$_SESSION['membre'][$key] = $value;
			}
		}
		
         header("location: profil.php");
         
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
		Echec de connexion, veuillez renseigner vos identifiants.  <br /> Pas encore inscrit ? <a class=\"text-dark\" href=\"inscription.php\"> C'est par ici ! </a></div>";
    }
} 
?>

<div class="jumbotron">
	<h1 class="display-4 d-flex justify-content-center text-info">Connectez vous !</h1>
	<p class="lead d-flex justify-content-center">Pour avoir acces à votre panier rapidement et sauvegarder vos achats en un clic .</p>
	<hr class="my-4">
		<form class="form-inline d-flex p-2 bd-highlight justify-content-center" method="post" >
			<div class="form-group mx-sm-4">
				<label for="inputPseudo" class="sr-only">Pseudonyme</label>
				<input type="text" class="form-control" name="pseudo" id="inputPseudo" placeholder="Pseudonyme">
			</div>
			<div class="form-group mx-sm-4">
				<label for="inputPassword" class="sr-only">Mot de passe</label>
				<input type="password" class="form-control" name="mdp"id="inputPassword2" placeholder="Le mot de passe?">
			</div>
			<button type="submit" class="btn btn bg-info text-white">Connexion</button>
		</form>
</div>


<?php
 require_once('inc/bas.inc.php');
?>