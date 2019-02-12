<?php

class Etudiant
{
    private $prenom;
    public function __construct($arg)//envoie au seter (set) pour etre sur que ca va dans le setter
    //on peu envoier plusier argument dans plusieur setter et guetter different il faut donc en avoir 
    //autant de getter que setter (il peu en avoir 40 setter  et 40 getter  !=)
    {
        echo "instanciantion, nous avons recu l'information suivante : $arg <br>";
        return $this->setPrenom($arg);
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($arg) // modifier avec le set pour afficher avec le get
    {
        $this->prenom = $arg;
    }
}
$etudiant =new Etudiant ('anas');
echo'<pre>';var_dump($etudiant); echo '</pre>';
echo'prenom : '.$etudiant->getPrenom() . '<br>';

$etudiant->setPrenom('yousfi anas'); // modifier avec le set pour afficher avec le get

echo 'prenom :'.$etudiant->getPrenom().'<hr>'; //get pour afficher 