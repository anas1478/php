<?php
class Compteur
{
    public static $nbInstanceClass=0;
    public $nbInstanceObjet =0;
    public function __construct()
    {
        ++self::$nbInstanceClass;
        ++$this->nbInstanceObjet;
    }
}
$c1=new Compteur;
$c2=new Compteur;
$c3=new Compteur;
$c4=new Compteur;
$c5=new Compteur;

echo"Nombre de fois que la class a ete instanciée ". Compteur::$nbInstanceClass. "<hr>";
echo"Nombre de fois que la class a ete instanciée ". $c5->nbInsranceObjet. "<hr>";


bwaaaaah  <-- "C'est Mohamed !"