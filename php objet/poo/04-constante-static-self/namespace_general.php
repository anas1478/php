<?php
namespace General;

require_once ('namespace_comemerce.php');
USE Commerce1, Commerce2, Commerce3;

echo __NAMESPACE__;

$std =new \StdClass();
var_dump($std);

echo '<hr>';
$commande =new Comemerce1\Commande;

var_dump($commande);
$commande =new Comemerce1\Commande;

var_dump($commande);
$commande =new Comemerce1\Commande;

var_dump($commande);