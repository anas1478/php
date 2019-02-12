<?php

class Vehicule
{
    private static $marque = "BMW";
    private $couleur = "Noir";
    public static function setMarque($marque)
    {
        self::$marque = $marque;
    }
    public static function getMarque()
    {
        return self::$marque;
    }
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }
}

$vehicule = new Vehicule;
echo "Véhicule de marque <strong>" . $vehicule::getMarque() . "</strong> et de couleur <strong>" . $vehicule->getCouleur() . "</strong><hr><br>";

$vehicule2 = new Vehicule;
$vehicule2-> setCouleur("Bleu");
echo "Véhicule de marque <strong>" . $vehicule2::getMarque() . "</strong> et de couleur <strong>" . $vehicule2->getCouleur() . "</strong><hr><br>";

$vehicule3 = new Vehicule;
echo "Véhicule de marque <strong>" . $vehicule3::getMarque() . "</strong> et de couleur <strong>" . $vehicule3->getCouleur() . "</strong><hr><br>";

$vehicule4 = new Vehicule;
$vehicule4::setMarque("Mercedes");
echo "Véhicule de marque <strong>" . $vehicule4::getMarque() . "</strong> et de couleur <strong>" . $vehicule4->getCouleur() . "</strong><hr><br>";

$vehicule5 = new Vehicule;
echo "Véhicule de marque <strong>" . $vehicule5::getMarque() . "</strong> et de couleur <strong>" . $vehicule5->getCouleur() . "</strong><hr><br>";