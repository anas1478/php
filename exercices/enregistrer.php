<?php


if($_POST){

   try{

          $bdd= new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8','root','');

      }catch(Exception $e){
          die('Erreur:'.$e->getMessage());
      }

   //    user_id je peux le degager car il est auto incremente
      $query = $bdd->prepare("INSERT INTO utilisateur (pseudo, pasword) VALUES (:pseudo, :mdp)");
      $query->execute(
          array(
              ':pseudo' => $_POST['pseudo'],
              ':mdp' => $_POST['password']
          ));
          $query->closeCursor();
}

?>

<!-- comment exploiter le formulaire pr enregistre unelement dans la BDD -->
<form action="" method="post">
   <label >Pseudo:</label><br>
   <input type="text" name="pseudo"><br>
   <label >Mot de passe:</label><br>
   <input type="text" name="password"><br>
   <input type="submit" value="Envoyer"><br>

</form>