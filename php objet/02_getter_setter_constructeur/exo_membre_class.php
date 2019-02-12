<?php
# faire les getter et setter 

class Membre

{
    private $pseudo;
    private $mdp;

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function setMdp($mdp){
        $this->mdp = $mdp;
    }
    public function getMdp(){
        return $this->mdp;
    }  
}
//-----------afichage------------------

$membre1 = new Membre;
//-------------------------------------------------------------------------------
$membre1->setPseudo('youah');
echo $membre1->getPseudo().'<hr>';


$membre1->setmdp('azery');
echo $membre1->getMdp().'<hr>';

//------------------------------------------------------------------------------
