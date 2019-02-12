<?php
class Autoload
{
    public static function className($className)
    {
      // echo  __DIR__ . '/'. str_replace('\\','/',$className . '.php')."<br>";
        require __DIR__ . '/'. str_replace('\\','/',$className . '.php');
    }
}
spl_autoload_register(array('Autoload','className'));// des qu'on met "new" il le met dans $className dans la fonction 
// la fonction className pour metre automatiquement le tout a la racine 

//$a=new Controller\Controller; (c'est un teste)