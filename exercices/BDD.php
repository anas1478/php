<?php


try{
// je fait appel a l'objet PDO
   $bdd = new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8','root','');

}catch(Exception $e){//j'attrape l'erreur et affiche le message d'erreur
   die('Erreur:'.$e->getMessage());
}

// on recupere tout le contenu de la table utilisateur
// la reponse est inexploitable car j'ai un sac d'info
// query() permet de declarer une requete


$query = $bdd->query("SELECT * FROM utilisateur");

// affiche chaque entrée une à une
while($donnees = $query -> fetch()){
   echo $donnees['user_id']." ".$donnees['pseudo']." ".$donnees['password']."<br>";
}

// terminer le traitement de la requete

$query->closeCursor();

?>