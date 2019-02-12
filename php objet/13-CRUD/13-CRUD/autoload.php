<?php

class Autoload
{
    public static function className($className)
    {
        require __DIR__ . "/" . str_replace("\\", "/", $className . '.php'); // str_replace permet de remplacer les anti-slash '\' par des slash '/', nous avons mis deux anti-slash sinon l'interpreteur considère que c'est un caractère d'echappement
        //echo __DIR__ . "/" . str_replace("\\", "/", $className . '.php');
    }
}

spl_autoload_register(array('Autoload', 'className')); // spl_autoload_register() quand l'interpreteur voit passer le mot clé 'new', il va dans la classe 'Autoload' et execute la fonction 'className', il prend ce qui se trouve à côté du new 'Controller\Controller' et il l'envoi en argument de la fonction
// echo __DIR__ . "<br>";

//$a = new Controller\Controller;
$a = new Model\EntityRepository;