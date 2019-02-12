<?php
trait TPanier
{
    public $nbProduit = 1;
    public function affichageProduits()
    {
        return "Affichage des produits !!";
    }
  
}
//------------------------------------------------
trait TMembre
{
    public function affichageMembres()
    {
       return "Affichage des membres !!";
    }
    
}
//------------------------------------------------
class Site
{
    use TPanier, TMembre; // avoir acces a Panier et Membre
}
//------------------------------------------------
$site = new Site;
echo '<pre>'; var_dump($site) ; echo'</pre>'; 
echo '<pre>'; var_dump(get_class_methods($site)) ; echo'</pre>'; 

echo $site->affichageProduits()."<br>";
echo $site->affichageMembres()."<br>";
echo "Nombre de produits : " .$site->nbProduit .'<hr>';

/* 
    - Les traits ont été inventés pour repousser les limites de l'heritage. Il est possible pour une classe d'hérité de plusieurs traits en meme temps
    - Un trait est un regroupement de methodes pouvant être importées dans une classe
*/
