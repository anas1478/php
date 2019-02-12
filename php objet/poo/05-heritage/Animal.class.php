<?php

function pre($arg) {
    echo "<pre>";
    if(is_array($arg)) {
        for($a = 0; $a < count($arg); $a++) {
            if(count($arg) > $a + 1) echo $arg[$a + 1];
        }
    } else {
        echo $arg;
    }
    echo "<pre>";
}

class Animal {
    protected function deplacement () {
        return "je me deplace";
    }

    public function manger() {
        return "Je mange chaque jour";
    }
}

class Elephant extends Animal {
    public function wat() {
        return "je suis un elephant et " . $this->deplacement();
    }
}

$elephant = new Elephant;
pre(get_class_methods($elephant));

pre($elephant->wat());

class Chat extends Animal {
    public function wat() {
        return "je suis un chat";
    }
    public function manger() {
        return "je me goinfre comme un gros chat";
    }
}

$chat = new Chat;
pre($chat->wat());
