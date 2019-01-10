<?php

if($_POST){
try{

   $bdd = new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8','root','');

}catch(Exception $e){
   die('Erreur:'.$e->getMessage());
}

    $query = $bdd->prepare("SELECT pseudo,pasword from utilisateur where pseudo =:pseudo and pasword =:mdp");

$query ->execute(
    array(
        ':pseudo'=> $_POST['pseudo'],
        ':mdp'=> $_POST['password']
    )
    );

    $reponse= $query->fetch();
    if($reponse){
        echo"connection ok !";
    }
    else{
        echo"mdp ou pseudo incorrecte";
    }
    
    
 }
 




?>
<form action="" method="post">
   <label >Pseudo:</label><br>
   <input type="text" name="pseudo"><br>
   <label >Mot de passe:</label><br>
   <input type="text" name="password"><br>
   <input type="submit" value="Envoyer"><br>

</form>