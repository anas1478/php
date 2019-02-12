<?php

class Compteur {
    public static $nbInstanceClass = 0;
    public $nbInstanceObjet = 0;
    public function __construct() {
        ++self::$nbInstanceClass;
        ++$this->nbInstanceObjet;
    }
}

$c1 = new Compteur;
$c2 = new Compteur;
$c3 = new Compteur;
$c4 = new Compteur;
$c5 = new Compteur;

echo "Nombre de fois que la classe a ete instaniee : " . Compteur::$nbInstanceClass . "<hr>";
echo "Nombre de fois que l'objet' a ete instaniee : " . $c5->nbInstanceObjet . "<hr>";