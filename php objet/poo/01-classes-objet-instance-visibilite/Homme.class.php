<?php

class Homme 
{
    private $error;
    private $prenom;
    private $nom;
    public function setPrenom($prenom) {
        if(is_string($prenom)) {
            $this->prenom = $prenom;
        }
        else {
            $this->error = trigger_error("ce nest pas un string", E_USER_WARNING);
        }
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function setNom($nom) {
        if(is_string($nom)){
            $this->nom = $nom;
        }
    }
    public getNom () {
        return $this->nom;
    }
}

// 

$homme = new Homme;
$homme->setPrenom("Mohamed");

echo $homme->getPrenom() . "<hr>";