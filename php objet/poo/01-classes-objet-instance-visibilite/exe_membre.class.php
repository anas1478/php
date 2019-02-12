<?php

class Membre {
    private $pseudo;
    private $mdp;

    public function setPseudo ($pseudo) {
        return $this->pseudo = $pseudo;
    }
    public function getPseudo () {
        return $this->pseudo;
    }

    public function setMdp ($mdp) {
        return $this->mdp = md5($mdp);        
    }
    public function getMdp () {
        return $this->mdp;
    }
}


// 

$membre = new Membre;

// assigner les valeurs
$membre->setPseudo("Mohamed");
$membre->setMdp("1234");

// affichage 
echo "Utilisateur : " . $membre->getPseudo() . "<br>";
echo "Mot de passe : " . $membre->getMdp();