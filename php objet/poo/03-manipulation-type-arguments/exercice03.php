<?php

/*
    UML
    -----------------------------
    2 class :
    -----------------------------

    | Vehicule -> $litresEssence
    -----------------------------
    / setLitresEssence()
    / getLitresEssence()

    ------------------------------------------------------

    | Pompe -> $litresEssence
    -----------------------------
    / setLitresEssence()
    / getLitresEssence()
    / donnerEssense()


    1 - Création d'un véhicule 1
    2 - Attribuer un nombre de litres d'essence au véhicule 1 : 5 litres
    3 - Afficher le nombre de litre d'essence du véhicule 1
    4 - Création d'une pompe à essence
    5 - Attribuer un nombre de litres d'essence à la pompe : 800 litres
    6 - Afficher le nombre de litres d'essence de la pompe
    7 - La pompe donne de l'essence en faisant le plein (50L) à la voiture 1
    8 - Afficher le nombre de litres d'essence de la voiture après ravitaillement
    9 - Afficher le nombre de litres restant dans la pompe après ravitaillement

    piste --> public function donnerEssense(Vehicule $v);

*/

class Vehicule{
    private $litresEssence;
    public function setLitresEssence($litresEssence){
        $this->litresEssence = $litresEssence;
    }
    public function getLitresEssence(){
        return $this->litresEssence;
    }
}
$vehicule1 = new Vehicule;
$vehicule1->setLitresEssence(5);
echo '<pre> Votre vehicule a : ' . $vehicule1->getLitresEssence() . ' litres</pre>';

class Pompe{
    private $litresEssence;
    public function setLitresEssence($litresEssence){
        $this->litresEssence = $litresEssence;
    }
    public function getLitresEssence(){
        return $this->litresEssence;
    }
    public function donnerEssence(Vehicule $v){
        $this->setLitresEssence(($this->getLitresEssence()-50)+$v->getLitresEssence());
        $v->setLitresEssence(($v->getLitresEssence()+50)-$v->getLitresEssence());

        echo '<pre>La pompe verse des litres dans vôtre réservoir</pre>';
    }
}

$pompe1 = new Pompe;
$pompe1->setLitresEssence(800);
echo '<pre> Cette pompe a : ' . $pompe1->getLitresEssence() . ' litres</pre>';


$pompe1->donnerEssence($vehicule1);
echo '<pre> Votre vehicule a : ' . $vehicule1->getLitresEssence() . ' litres</pre>';
echo '<pre> Il reste : ' . $pompe1->getLitresEssence() . ' litres à la pompe</pre>';