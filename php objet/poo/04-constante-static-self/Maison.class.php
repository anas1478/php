<?php 

class Maison
{
    private static $nbPiece = 7;
    public static $espaceTerrain = "500m";
    public $couleur = 'blanc';
    const HAUTEUR = '10m';
    private $nbPorte = 10;
    public static function getNbPiece() {
        return self::$nbPiece;
    }
    public function getNbPorte() {
        return $this->nbPorte;
    }
}

function pre($arg) {
    echo "<pre>";
    echo($arg);
    echo "<pre>";
}

// afficher nbpiece maison
pre('Maison::getNbPiece() : ' . Maison::getNbPiece());

// 
$maison = new Maison;
pre('$maison->getNbPorte() : ' . $maison->getNbPorte());

pre('$espaceTerrain : ' . Maison::$espaceTerrain);

pre('$couleur : ' . $maison->couleur);

pre('HAUTEUR : ' . Maison::HAUTEUR);