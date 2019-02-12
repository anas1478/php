<?php

class Societe
{
  public $adresse;
  public $ville;
  public $cp;
                    // villes, Paris
  public function __set($nom, $valeur)
  {
    echo "La propriété <strong> $nom </strong> n'existe pas, la valeur <strong> $valeur</strong> n'a donc pas été affecter ! <hr>";
  }
  //__set() est une méthode magique qui se déclenche uniquement en cas de tentative d'affection sur une propriéte qui n'existe pas

  public function __get($nom)
  {
      echo  "La propriété <strong> $nom </strong> n'existe pas, on ne peut donc pas l'afficher <hr>!";
  }
}

$societe1 = new Societe;

$societe1->villes = "Paris"; // tentative d'affectation a une proprieété qui n'a pas été déclarer

echo $societe1->titre;
echo '<pre>'; var_dump($societe1) ; echo'</pre>'; 


