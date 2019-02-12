<?php
class Vehicule
{
    private static $marque ="BMW";// static  lorqu on changer l'objet on modifie la class aussi
    private $couleur ="noir";
    public function setMaque($marque)
    {
        self::$marque = $marque;//        'self :: '         pour rappeler qu'elle est static dans la class
    }
    public function getMarque()
    {
        return self:: $marque;       // pour pointer a l'exterieur  une fonction static a l'exterieur  c est avec '::' 
    }
    public function setCouleur($couleur)
    {
        $this->couleur =$couleur;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }
    
}
//----------------------------------------------------------

$vehicule1 = new Vehicule;

echo" voiture de marque ".$vehicule1->getMarque()." et de couleur ".$vehicule1->getCouleur();

$vehicule2 = new Vehicule;
$vehicule2->setCouleur('rouge');
echo"<br> voiture de marque ".$vehicule2->getMarque()." et de couleur ".$vehicule2->getCouleur();

$vehicule3 = new Vehicule;

echo"<br> voiture de marque ".$vehicule3->getMarque()." et de couleur ".$vehicule3->getCouleur();

$vehicule4 = new Vehicule;
$vehicule4->setMaque('Wv');
echo"<br> voiture de marque ".$vehicule4->getMarque()." et de couleur ".$vehicule4->getCouleur();

$vehicule5 = new Vehicule;

echo"<br> voiture de marque ".$vehicule5->getMarque()." et de couleur ".$vehicule5->getCouleur();

