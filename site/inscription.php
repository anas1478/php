<?php require_once "inc/init.inc.php"; 
      require_once "inc/haut.inc.php"; 
      
      if($_POST) {
          debug($_POST);
          $verif_caractere = preg_match('#^[a-zA-Z0-9._]+$#', $_POST['pseudo']);
          if(!$verif_caractere || (strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20)) {
              $content .= "<div class='alert alert-danger' role='alert'>le pseudo doit contenir entre 1 dg 20 catacteres. <br> catacteres accepte : lettres a-zA-Z chiffres 0-9</div>" ;
          } else {
              $membre = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
              if($membre->rowCount() > 0) {
                  $content .= "<div class='alert alert-danger' role='alert'>Pseudo indisponible veuillez choisir un autre.</div>";
              } else {
                  foreach ($_POST as $key => $value) {

                    // if($key === 'mdp') {
                    //     password_hash($value,PASSWORD_DEFAULT);
                    // }
                      $_POST[$key] = htmlspecialchars(addslashes($value));
                  }
                  executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, cp, adresse, accepter) VALUES ('$_POST[pseudo]',MD5('$_POST[mdp]'),'$_POST[nom]','$_POST[prenom]', '$_POST[email]','$_POST[civilite]','$_POST[ville]','$_POST[cp]','$_POST[adresse]','$_POST[accepter]')");
                  
                  $content .= "<div class='alert alert-success' role='alert'>Felicitation! vous etes inscrit! <a href='connexion.php'>Cliquez ici</a> pour vous connecter</div>";
              }
          }
      }
      
?>
<form method="post" action="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPseudo4">Pseudo</label>
      <input type="text" name="pseudo" class="form-control" id="inputPseudo4" placeholder="Pseudo">
    </div>
    <div class="form-group col-md-6">
      <label for="inputNom4">Nom</label>
      <input type="text" name="nom" class="form-control" id="inputNom4" placeholder="Nom">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPrenom4">Prénom</label>
      <input type="text" name="prenom" class="form-control" id="inputPrenom4" placeholder="Prenom">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mot de passe</label>
      <input type="password" name="mdp" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresse</label>
    <input type="text" name="adresse" pattern="[a-zA-Z0-9-_.\s]{5,15}" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2" class="m-3">Civilité: <br>
        <input class="form-check-input" type="radio" name="civilite" value="m" id="gridCheck" checked><span class="mr-4">Homme</span>
        <input class="form-check-input" type="radio" name="civilite" value="f" id="gridCheck2"><span>Femme</span>
    </label>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Ville</label>
      <input type="text" name="ville" pattern="[a-zA-Z0-9-_.\s]{5,15}" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Code postal</label>
      <input type="text" name="cp" pattern="[0-9]{5}" class="form-control" id="inputZip">
    </div>
  </div>
  <label for="">
    <input class="form-check-input" type="checkbox" name="accepter" value="accepter" id="gridCheck" required>J'accepte les CGU
  </label><br>
  <button type="submit" class="btn btn-primary">s'inscrir</button>
</form>

<?php require_once "inc/bas.inc.php"; ?>