<?php 

function pre($arg) {
    echo "<pre>";
    if(is_array($arg)) {
        for($a = 0; $a < count($arg); $a++) {
            echo $arg[$a];
        }
    } else {
        echo $arg;
    }
    echo "<pre>";
}

class A {
    public function test1() {
        return "test1";
    }
}

class B extends A {
    public function test2() {
        return "test2";
    }
}

class C extends B {
    public function test3() {
        return "test3";
    }
}

// Exo creer un objet issu de la classe C et afficher les methodes issu de la classe
$c = new C;

pre(get_class_methods($c));