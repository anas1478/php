<?php
require_once "inc/init.inc.php";
require_once "inc/haut.inc.php";
$res = executeRequete("SELECT * FROM produit where id_produit= '$_GET[id_produit]'");
if($res->rowCount()) {


while($r = $res->fetch()) {
    echo 
     "Titre :" .$r['titre']."<br><img src='".$r['photo']."'width=200><br>".
     "Desctiption : ".$r['description'].
    "<br>"."PRIX :".$r['prix']."€ <br>"; 
    echo   
    "il ne reste plus que ". $r['stock']." article.";
    echo
    "<a href='?action=rev'>revenir à la boutique</a>";
    
}

}
if(isset($_GET['action']) && $_GET['action']=='rev'){
        echo "dfdifgsmfé";
        header('location: boutique.php');
    }

    echo '
    
    <select>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    <button type="button" class="btn btn-primary">ajouter au panier</button>'
 

    

  
?>
<?php
  require_once 'inc/bas.inc.php';
  ?>

