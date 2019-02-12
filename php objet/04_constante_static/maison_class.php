<?php
class Maison

{
    private static $nbPiece =7;
    public static $espaceTerrain ="500m2";
    public $couleur ="blanc";
    const HAUTEUR ="10m";
    private $nbPorte =10;
    public static function getNbPiece()
    {
        return self::$nbPiece;
    }
    public function getNbPorte()
    {
        return $this->nbPorte;
    }
}
echo Maison:: getNbPiece();

 $maison1= new Maison;

 echo "<hr>".Maison::$espaceTerrain."<br>";

 echo Maison::HAUTEUR ."<br>";

echo $maison1->couleur."<hr>";

echo $maison1->getNbPorte();



