<?php

function executeRequete($req) {
    global $bdd;

    $result = $bdd->query($req);

    return $result;
}

function debug($d, $mode = 1) {
    echo "<div class='alert alert-warning' role='alert'>";
    $trace = debug_backtrace();
    echo "debug demandé dans le fichier " . $trace[0]['file'] . ' à  la ligne ' . $trace[0]['line'];

    if($mode == 1) {
        echo "<pre>" ; print_r($d) ; echo "</pre>";
    } else {
        var_dump($d);
    }
    echo "</div>";
}

function userConnected() {
    if(!isset($_SESSION['membre'])) return false;
    else return true;
}

function adminConnected() {
    if(userConnected() && $_SESSION['membre']['status'] == 1) return true;
    else return false;
}