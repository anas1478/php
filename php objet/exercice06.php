<?php
abstract class Vehicule
{
    final public function demarrer()
    {
        return 'Je demarre';
    }
    abstract public function carburant();
    public function nombreDeTestObligatoire()
    {
        return 100;
    }
}
class Peugeot extends Vehicule
{
    public function carburant()
    {
        return 'Essence';
    }
    //4- Le Renault doit effectuer 30 tests de plus qu'un vehicule de base :
    public function nombreDeTestObligatoire()
    {
        return parent::nombreDeTestObligatoire() + 70;
    }
   
}
// $vehicule = new Vehicule;
#-------------------------------------------------------------
class Renault extends Vehicule
{
    public function carburant()
    {
        return 'Diesel';
    }
    public function nombreDeTestObligatoire()
    {
        return parent::nombreDeTestObligatoire() + 30;
    }
     
}

    /* 
        1- Faire en sorte de ne pas avoir d'objet Vehicule --> (abstract)
        2- Obligatoire pour la Renault et la Peugeot de posséder la même méthode demarrer() qu'un véhicule de base --> (final)
        3- Obligatoire pour la Renault de declarer un carburant diesel et pour Peugeot de déclarer un carburant essence --> (abstract)
        4- Le Renault doit effectuer 30 tests de plus qu'un vehicule de base  --> surcharge ()
        5- Le Peugeot doit effectuer 70 tests de plus qu'un vehicule de base  --> surcharge ()
        6- Effectuer les affichages nécessaires
    */

$renault = new Renault;
echo 'Peugeot >' . $renault->demarrer().'<br>';
echo 'Peugeot >' . $renault->carburant().'<br>';
echo 'Peugeot >' . $renault->nombreDeTestObligatoire().'<hr>';

$peugeot = new Peugeot;
echo 'Renault >' . $peugeot->demarrer() .'<br>';
echo 'Renault >' . $peugeot->carburant().'<br>';
echo 'Renault >' . $peugeot->nombreDeTestObligatoire().'<hr>';



