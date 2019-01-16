<?php 
require_once "../inc/haut.inc.php";
require_once "../inc/init.inc.php";

echo '

<table class="table">
  <thead>
    <tr>
      <th scope="col">id commande</th>
      <th scope="col"><a href="?trier">montant</a></th>
      <th scope="col"><a href="?date">date</a></th>
      <th scope="col">Etat</th>
    </tr>
  </thead>
';	 
// requete
$conditions="SELECT * FROM commande ";

if(isset($_GET['trier'])||isset($_GET['date'])) {
    $conditions .=" order by ";
    
    if(isset($_GET['trier'])){
        $conditions .=" montant ";
    }
    if(isset($_GET['date'])){
        $conditions .=" date_enregistrement ";
    } 

    $conditions .=" desc ";
}

 
// $commande_details = executeRequete("SELECT * FROM details_commande");
    $commande = executeRequete($conditions);
    debug($conditions);

while ($i = $commande->fetch()) {
    echo '
    <tbody>
    <tr>
      <th scope="row"> '. $i['id_commande'] .' </th>
      <th scope="row"> '. $i['montant'] .' </th>
      <th scope="row"> '. $i['date_enregistrement'] .' </th>
      <th scope="row"> 
      
 
<form method="GET" action="gestion_commande.php?">
     <input type="hidden" name="idcmd" value="'. $i['id_commande'] .'">
<div class="form-check">
<input class="form-check-input" type="radio" name="changer" id="exampleRadios1" value="option1" checked>
<label class="form-check-label" for="exampleRadios1">
  en cours de traitement
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="changer" id="exampleRadios2" value="option2">
<label class="form-check-label" for="exampleRadios2">
  envoyé
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="changer" id="exampleRadios2" value="option3">
<label class="form-check-label" for="exampleRadios2">
  expedié
</label>
</div>
<button type="submit">changer</button>     
</form>    
    ';
}

//    if(isset($_GET['idcmd']) && isset($_GET['changer'])){
//        $update_commande = executeRequete("UPDATE commande SET etat = ")
//    }


require_once "../inc/bas.inc.php";
?>