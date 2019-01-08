<?php
require_once "inc/init.inc.php";
require_once "inc/haut.inc.php";

if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    $requete = executeRequete("SELECT * from membre where pseudo='$_POST[pseudo]' AND mdp=MD5('$_POST[mdp]')");

    if($requete->rowCount() > 0) {
        header("location: profil.php");
        $_SESSION['pseudo'] = $_POST['pseudo'];
    } else {
        echo "<div class='alert alert-danger' role='alert'>Pseudo ou/et mot de passe incorrect!</div>" ;
    }
} 

?>
<form method="post" action="">
<div class="form-group">
  <label for="exampleInputEmail1">pseudo</label>
  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pseudo" name="pseudo">
  <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
  <label for="exampleInputPassword1">Mot de passe</label>
  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="mot de passe" name="mdp">
</div>
<button type="submit" class="btn btn-primary">connection</button>
</form>

<?php 
require_once "inc/bas.inc.php";
?>