<?php
# faire les getter et setter 

class Vehicule

{
    private $litresEssence;
  

    public function setLitreEssence($litresEssence){
        $this->litresEssence = $litresEssence;
    }
    public function getlitreEssence(){
        return $this->litresEssence;
    }

}
//----------------------------

class Pompe

{
    private $litresEssence;
  

    public function setLitreEssence($litresEssence){
        $this->litresEssence = $litresEssence;
    }
    public function getlitreEssence(){
        return $this->litresEssence;
    }
    public function donnerEssence(vehicule $v){
        $this->setLitreEssence($this->getlitreEssence() - (50- $v->getlitreEssence()));
        $v->setLitreEssence($v->getlitreEssence()+(50 - $v->getlitreEssence()));
    }
   
  
}
//-----------afichage------------------




$vehicule1 = new Vehicule;
//-------------------------------------------------------------------------------
echo'lenombre de litre de la pompe est de :'.$vehicule1->setLitreEssence(5);
echo $vehicule1->getlitreEssence().'<hr>';

$pompe1 = new pompe;
//-------------------------------------------------------------------------------
echo'le nombre de litre de la pompe qui reste est de :'.$pompe1->setLitreEssence(800);
$pompe1->donnerEssence($vehicule1);
echo $pompe1->getlitreEssence().'<hr>';
echo"<hr> apres ravitaillement le vehicule1 posède <stong>".$vehicule1->getlitreEssence() ."</strong> litre d'essence";
