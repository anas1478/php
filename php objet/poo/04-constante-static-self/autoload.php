<?php
function inclusionAutomatique($nomDeLaClasse){
    require_once($nomDeLaClasse. 'class.php');
    echo "on passe dans inclusionAutomaque <hr>";
    echo"require($nomDeLaClasse.class.php)<hr>";
}