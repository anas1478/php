<?php 
require_once('inc/init.inc.php');
require_once('inc/haut.inc.php');

if($_POST){
	debug($_POST);
	//verification du format de pseudo
	$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']);
	if(!$verif_caractere || (strlen($_POST['pseudo']) < 1 ||strlen($_POST['pseudo']) > 20)){
		$content .= "<div class=\"alert alert-danger\" role=\"alert\"> Le pseudo doit contenir entre 1 et 20 caractères. <br /> Caractères autorisés : Lettres de a-z et A-Z et les chiffres !</div>";
	}else{
		$membre = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
		//vérifie la disponibilité du pseudo
		if($membre->rowCount() > 0){
			$content .= "<div class=\"alert alert-danger\" role=\"alert\">
			Ce pseudonyme est victime de son succès !</div>";
		}else{
			//criptage du mot de passe
			foreach($_POST as $key => $value){
				// if($key === 'mdp'){
				// 	$_POST['mdp'] = password_hash($value, PASSWORD_DEFAULT);
				// }
				$_POST[$key] = htmlspecialchars(addslashes($value));
			}
			//Créé un contact
			executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, cp, adresse) VALUES ('$_POST[pseudo]',MD5('$_POST[mdp]'),'$_POST[nom]','$_POST[prenom]','$_POST[email]','$_POST[civilite]','$_POST[ville]','$_POST[cp]','$_POST[adresse]')");

			$content .= "<div class=\"alert alert-success\" role=\"alert\">
			Félicitation vous êtes inscrit ! <br /> <a class=\"text-dark\" href=\"connexion.php\"> Cliquez ici ! </a> pour vous connecter </div>";	
		}		
	}
}
?>
<?php echo $content; ?>
<form method="post" action="">

	<div class="form-row">
	  	<div class="form-group col-md-4">
      		<label for="inputCivilite">Civilité : </label>
      		<input type="radio" name="civilite" id="inputCivilite" value ="m"> Homme
	  		<input type="radio" name="civilite" id="inputCivilite" value ="f" checked> Femme
   		</div>
	</div>
	
  	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="inputPseudo">Pseudo</label>
			<input type="text" name="pseudo" class="form-control" id="inputPseudo" placeholder="Pseudonyme">
		</div>

		<div class="form-group col-md-6">
			<label for="inputPassword">Password</label>
			<input type="password" name="mdp" class="form-control" id="inputPassword" placeholder="Password">
		</div>
  	</div>

  	<div class="form-row">
		<div class="form-group col-md-4">
			<label for="inputName">Nom</label>
			<input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom">
		</div>
		<div class="form-group col-md-4">
			<label for="inputPrenom">Prenom</label>
			<input type="prenom" name="prenom" class="form-control" id="inputPrenom" placeholder="Prenom">
		</div>
  	
    	<div class="form-group col-md-4">
      		<label for="inputEmail">Email</label>
      		<input type="email" name="email" class="form-control" placeholder="monadresse@mail.com" id="inputEmail">
    	</div>
	</div>

	<div class="form-row">
    	<div class="form-group col-md-6">
      		<label for="inputAdress">Adresse</label>
      		<input type="text" name="adresse" class="form-control" id="inputAdresse" placeholder="123 rue de...">
    	</div>

		<div class="form-group col-md-3">
      		<label for="inputCity">Ville</label>
      		<input type="text" name="ville" class="form-control" id="inputCity4" placeholder="Ville">
    	</div>

    	<div class="form-group col-md-3">
      		<label for="inputCp">Code Postal</label>
      		<input type="text" name="cp" class="form-control" id="inputCp" maxlength="5" placeholder="75000">
    	</div>
	</div>
  	
  	<div class="form-row d-flex justify-content-around">
    	<div class="form-check">
      		<input class="form-check-input" name="accepte" type="checkbox" id="gridCheck" required>
      		
		</div>

		<button type="submit" class="btn btn bg-info text-white">Créer mon compte</button>
    </div>
  	
  	
</form>

<?php
	require_once('inc/bas.inc.php');
?>