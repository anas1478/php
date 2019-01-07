<?php
if($_POST){
$bdd = new PDO('mysql:host= localhost;dbname=utilisateurs;charset=UTF8','root','');

}catch(Exception $e){
    die('erreur:'.$e->getMessage());
}
$bdd ->prepare('')






?>
<form action="" method="post">
   <label >Pseudo:</label><br>
   <input type="text" name="pseudo"><br>
   <label >Mot de passe:</label><br>
   <input type="text" name="password"><br>
   <input type="submit" value="Envoyer"><br>

</form>