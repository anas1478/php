<?php

class Panier
{
    public $nbProduits;
    public function ajouterArticle()
    {
        return "l'article a été ajouté";
    }
    protected function retirerAritcle()
    {
        return "l'article a été retirer";
    }
    private function afficherArticle()
    {
        return "voici les articles";
    }
}

$panier1= new Panier;
echo '<pre>'; var_dump($panier1); echo'</pre>';

$panier1->nbProduits =5;
echo '<pre>'; var_dump($panier1); echo'</pre>';
echo"nombre de produit dan l panier 1 : ".$panier1->nbProduits . "<br>";
echo "panier1 -->" . $panier1->ajouterArticle().'<br>';



$panier2 = new Panier;
echo '<pre>'; var_dump($panier2); echo'</pre>';
$panier2->nbProduits = 3;
echo"nombre de produit dan l panier 2 : ".$panier2->nbProduits . "<br>";
echo '<pre>'; var_dump($panier2); echo'</pre>';