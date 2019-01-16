<?php

require_once "../inc/haut.inc.php";
require_once "../inc/init.inc.php";

// afficher tous les comptes d'utilisateur de site
if(internauteEstConnecteEtEstAdmin()) {

    // supprimer un utilisateur
    $users = executeRequete("SELECT * FROM membre where status <> 1");
    // debug($users);
    if(isset($_GET['supprimer']) && !empty($_GET['supprimer'])) {
        // DELETE FROM `membre` WHERE 
        $user_a_supprimer = executeRequete("DELETE FROM membre WHERE pseudo='$_GET[supprimer]'");
        // echo "DELETE FROM membre WHERE pseudo=$_GET[supprimer]";
        if($user_a_supprimer) {
            echo "<script>alert('Utilisateur: $_GET[supprimer] à été supprimer!'); window.location.href='gestion_membre.php';</script>";
        } else {
            echo "<script>alert('Error!'); window.location.href='gestion_membre.php';</script>";
        }
    }

    // ajouter le form if get action = ajouter
    if(!isset($_GET['action'])) $_GET['action'] = "";
    if($_GET['action'] == "ajouter" && isset($_GET['action'])) {
        echo '
        
        <form method="post" action="../inscription.php">

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
                  <label class="form-check-label" for="gridCheck">
                       J\'accepte
                  </label>
            </div>
    
            <button type="submit" class="btn btn bg-info text-white">Créer mon compte</button>
        </div>
          
          
    </form>
        
        ';
    }
    if(!empty($_GET['newadmin']) && isset($_GET['newadmin'])) {
        $toAdmin = executeRequete("UPDATE membre SET status=1 where status=0 AND pseudo='$_GET[newadmin]'");

        if($toAdmin) {
            echo "<script>alert('".$_GET['newadmin']." est maintenant un admin'); window.location.href='gestion_membre.php'</script>";
        } else {
            echo "erreur!";        
        }
    }
?>  

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">pseudo</th>
      <th scope="col">nom</th>
      <th scope="col">email</th>
      <th scope="col">civilite</th>
      <th scope="col">ville</th>
      <th scope="col">code postal</th>
      <th scope="col">adresse</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
    <tbody>
<?php
    while($row = $users->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <tr>
            <td>'.$row["id_membre"].'</td>
            <td>'.$row["pseudo"].'</td>
            <td>'.$row["nom"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["civilite"].'</td>
            <td>'.$row["ville"].'</td>
            <td>'.$row["cp"].'</td>
            <td>'.$row["adresse"].'</td>
            <td><a href="?supprimer='.$row["pseudo"].'">Supprimer</a></td>
            <td><a href="?newadmin='.$row["pseudo"].'">Devenir admin</a></td>
        </tr>
        ';
    }
?>
  </tbody>
</table>
<a class="btn btn-success text-light d-block m-auto w-25" href="?action=ajouter">Ajouter un utilisateur</a>
<?php
} else {
    header("location: ../boutique.php");
}

require_once "../inc/bas.inc.php";
