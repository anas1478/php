<?php
final class Application
{
    public function lancementApplication()
    {
        return "L'application se lance comme cela !! <br>";
    }
}

//-------------------------------------------------------
$app = new Application;
echo "<pre>"; var_dump($app); echo "</pr>";
echo $app->lancementApplication();

 /* 
    class Test extends Application{} 
    /!\ erreur!!! on ne peux pas herité d'une class final 
*/
//-------------------------------------------------------
class Application2
{
    final public function lancementApplication()
    {
        return "L'application se lance comme cela !! <br>";
    }

}

class Extension extends Application2
{
    /* public function lancementApplication(){}
    /!\ erreur!!! on ne peux pas surcharger ou redefinir une méthode final 
        
    */
}
//----------------------------------------------------------
$ext = new Extension;
echo $ext->lancementApplication();

/* 
    Une classe finale ne peut pas etre héritée 
    - Une classe finale reste instanciable
    - Une méthode finale peut etre présente dans une classe normale
    - Une méthode finale permet d'eviter qu'elle soit redifinie ou surcharger
    - L'interet de mettre le mot clé 'final' sur une méthode est de vérouiller afin d'empecher tout sous-classe de la redefinir(quand nous voulons que le comportement d'une méthode soit préservé durant l"heritage)
*/