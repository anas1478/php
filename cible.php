<?php

$contacts = array("id" => $_GET['id'], "nom" => $_GET['nom'], "age" => $_GET['age'], "telephone" => $_GET['tel']);

foreach($contacts as $contact => $attr) {
    echo "-$contact => $attr <br>";
}