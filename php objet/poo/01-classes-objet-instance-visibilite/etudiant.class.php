<?php 
// class Panier 
// {
//     public $nbProduits;
//     public function ajouterArticle() 
//     {
//         return "Article ajouté !";
//     }
//     protected function retirerArticle() 
//     {
//         return "L'article a ete retire !";
//     }
//     private function affichageArticle() 
//     {
//         return "Voici les articles";
//     }
// }

// $panier1 = new Panier;

// echo "<pre>";
// var_dump($panier1);
// echo "</pre>";

// echo "<pre>"; var_dump(get_class_methods($panier1)); echo "</pre>";

// $panier1->nbProduits = 5;
// echo "<pre>"; print_r($panier1); echo "</pre>";

// echo "Nombre de produit dans le panier 1 : " . $panier1->nbProduits . '<br>';
// echo "panier 1 > " . $panier1->ajouterArticle() . '<br>';
// echo "panier 1 > " . $panier1->retirerArticle() . '<br>';
// echo "panier 1 > " . $panier1->affichageArticle() . '<br>';

$panier2= new Panier;
echo "<pre>" ; var_dump($panier2); echo "</pre>";

class Etudiant 
{
    private $prenom;
    public function __construct($arg) 
    {
        echo "Instanciation, nous avons recu linformation suivante : $arg<br>";
        return $this->setPrenom($arg);
    }
    public function setPrenom ($arg) {
        $this->prenom = $arg;
    }
    public function getPrenom () {
        return $this->prenom;
    }
}

$etudiant = new Etudiant('mohamed');
echo "<pre>"; var_dump($etudiant); echo "</pre>";