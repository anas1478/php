<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="PHP HTML">
        <meta name="author" content="Sonia Bougamha">
        <meta name="description" content="Le cours sur PHP"> 
        <title>Entrainement</title>
    </head>

    <body>
		<style> h2{
			margin: 0;
			padding: 10px;
			font-size:25px;
			color: #fff;
			background-color: #000;
			text-align: center;
		}
		span:first-of-type {
			color:blue;
		}
   		span:nth-of-type(2) {
			color:#fff; text-shadow:0 0 10px #000;
		}
   		span:last-of-type {
			color:red;
		}

		</style>
		<h2>Affichage et écriture</h2>

		<?php 
		echo "bonjour";
		echo "<hr />";
		print "Nous sommes mercredi";
		?>
		<p> Je peux <strong>mélanger</strong> du HTML et le PHP, on peut mettre du HTML dans du PHP mais pas l'inverse.</p>
		<?= "encore du texte" /*remplace echo */?> 

		<?php
		echo "<h2>Variable : type /déclaration /affectation </h2>";
		$a = 1247;
		echo gettype($a);// integer
		$b = 1.5;
		echo gettype($b);//double
		$c = "varchar";
		echo gettype($c);//string
		$a = true;
		echo gettype($a);//boolean
		echo "<br />";

		echo "<h2> La concaténation</h2>";
		$x = "Bonjour";
		$y = "tout le monde";
		echo $x . $y . "<br />";
		echo "$x $y <br />";
		echo "Bonjour", "tout le monde";
		echo "$x $y <br />";

		echo "<h2>La concatenation lors de l'affectations</h2>";
		$prenom = "Marie";
		$prenom .= "-Curie";
		echo $prenom;
		echo "<br />";

		echo "<h2>Guillemets et Quotes </h2>";
		$message = "aujourd'hui";
		$message = 'aujourd\'hui';
		$prenom2 = "Pierre";
		$prenom3 = "Jacques";
		echo "Bonjour $prenom2 et $prenom3 <br />";
		echo 'Bonjour $prenom2 et $prenom3 <br />'; // n'interprète pas les variables
		echo "$x $y <br />";
		echo "<br />";

		echo "<h2> Constante et constantes magiques</h2>";
		define ("CAPITALE", "Paris");
		echo CAPITALE . "<br>";
		echo __FILE__ . "<br>";
		echo __LINE__ . "<br>";
		
		echo "<h2>Opérateurs arithmétiques</h2> <br>";
		$a = 1;
		$b = 2;
		$r = $a+$b;
		echo $r;
		echo "<br />";
		// + - * /

		echo "<h2>Structure conditionelles et opérateurs de comparaison</h2> <br>";
		// Isset et Empty
		//empty va tester si c'est une variable est vide ou égale à 0
		//isset va tester si une variable est définies
		$var = "";
		if(isset($var)) {
			echo "var existe et est définie par rien <br>";
			};
		
		$var2 = 23;
		if(empty($var2)) {
		echo "var2 est vide <br>";
		};
		$var2 = 0;
		if(empty($var2)) {
		echo "var2 est vide, 0 ou non définie <br>";
		};		
		/*
			= est egal
			< supérieur
			> inférieur
			<= supérieur ou égal
			>= inférieur ou égal
			!== différent type et valeur
			!= différent de
			== comparaison de la valeur
			=== comparaison valeur et type
			|| ou
			&& et
		*/		
		// exercice  : définir 2 variables a et b
		// a vaut 10 et b vaut '10' et vérifier avec une condition si ils ont la même valeur
		$a = 10;
		$b = "10";
		if($a == $b){
			echo gettype($a);
			echo gettype($b);
		};
		echo "<br />";

		// afficher Bleu-Blanc-Rouge (avec les tirets) en mettant le texte de chaque couleur dans des variables
		$bleu = "<span>bleu</span>";
		$blanc = "<span>blanc</span>";
		$rouge = "<span>rouge</span>";
		echo $bleu . "-" . $blanc . "-" . $rouge . "<br />";

		echo "<h2> Les fonctions prédéfinies</h2>";
		// exercice: créer une var email et vérifier si c'est une adresse e-mail valide ou pas.
		$mail = "sonia.bougamha@lepoles.com";
		if ("@"== true){
			echo strpos($mail, "@");
		};
		$mail2 = "email";
		var_dump(strpos($mail, "@"));
		echo "<br />";
	
		$phrase = "Il était une fois la belle et la bête";
		echo "<br />" . iconv_strlen($phrase) . "<br />";
		echo substr($phrase, 0, 18) . '...' . "<a href='#'> Lire la suite </a>";

		echo "<h2> Fonction utilisateur </h2>";
		function espc(){
			echo  "<br />";
		};
		espc();

		//exercice : créer une fonction meteo qui permet d'afficher la saison et la température. "Nous sommes en hiver et il fait 1°C. Attention gérer le des singuliers/pluriels.
		function meteo ($saison, $temperature){
			echo "Nous sommes en " . $saison . " et il fait " . $temperature . " degré";
			if ($temperature <-1 || $temperature > 1){
					echo "s";
			}
		};
		meteo ("hiver", 5);
		espc();

		//exercice : TVA à 19,6
		function tva ($taxe, $prix){
			$ttc = $prix+$prix/100*$taxe;
			echo $ttc;
		};
		tva ( 19.6, 200);
		espc();

		//exercice : vérifier l'age de l'utilisateur
		function verage($age){
			if ($age >= 18){
				echo "Tu es majeur";
			}else{
				echo "Tu n'es pas majeur";
			}
		};
		verage(17);
		espc();

		echo "<h2>Les boucles </h2>";
		echo "<select>";
			for($i = 0; $i<3; $i++){
				echo "<option>  $i  </option>";
			}
		echo "<select>";	
		espc();

		echo "<h2> L'inclusion de fichiers </h2>";
        
        echo "<h2>Les tableaux de donnees ARRAY</h2>";

        $list = array("jorge", "maria", "valeria", "mohamed", "carlos");
        $list[] = "rachid";
        echo "print_r(expression)";
        echo "<pre>";
        print_r($list);
        echo "</pre>";

        echo "var_dump(expression)";
        echo "<pre>";
        var_dump($list);
        echo "</pre>";

        $tab[] = "france";
        $tab[] = "maroc";
        $tab[] = "espagne";

        var_dump("var_dump(expression)");
        echo "<pre>";
        var_dump($tab);
        echo "</pre>";

        for($i = 0; $i < sizeof($list); $i++) {
            echo "$list[$i]<br>";
        }

        $i = 0;
        while ($i < count($list)) {
            echo "$list[$i]<br>";
            $i++;
        }
        echo "<hr>";

        $i = 0;
        do {
            echo "$list[$i]<br>";
            $i++;
        } while ($i < count($list));

        // creer une liste de  10 fruits afficher la liste avec une boucle for, do et do while une liste en html ul li

        $fruits = array("pomme", "banan", "fraise", "kiwi", "ananas", "mangue", "cerise", "papaye", "mandarine", "melon");

        echo "<ul>";
        for($f = 0; $f < count($fruits); $f++) {
            echo "<li>$fruits[$f]</li>";
        }
        echo "</ul>";
        echo "<hr>";

        $f = 0;
        echo "<ul>";
        while ($f < count($fruits)) {
            echo "<li>$fruits[$f]</li>";
            $f++;
        }
        echo "</ul>";
        echo "<hr>";

        $f = 0;
        echo "<ul>";
        do {
            echo "<li>$fruits[$f]</li>";
            $f++;
        } while ($f < count($fruits));
        echo "</ul>";

        echo "<h2>Tableau multidimensionnel</h2>";

        $tabMulti = array(
            0 => array("prenom" => "julien","nom" => "dupont"), 
            1 => array("prenom" => "yassine", "nom" => "jaagoub")
        );

        // afficher ce tableau avec une boucle for

        for($i = 0; $i < count($tabMulti); $i++) {
            echo($tabMulti[$i]["prenom"] . "<br>");
        }

        // foreach ($tabMulti as $k => $v) {
        //         var_dump($k);
        //         for($t = 0; $t < count($k); $t++) {
        //             echo "$tabMulti[t]";
        //         }
        // }

        for($i = 0; $i < count($tabMulti); $i++) {
            foreach($tabMulti[$i] as $k => $v) {
            // for($x =0; $x < count($tabMulti[$i]); $x++) {
                echo "$k => $v <br>";
            }
        }

        echo "<h2>Les Objets</h2>";

        class Etudiant {
            public $prenom = "Julien";
            public $age = 25;

            public function resident() {
                return "France";
            }
        }

        $objet = new Etudiant();

        echo $objet->prenom . "<br>";
        echo $objet->age . "<br>";
        echo $objet->resident() . "<br>";

        // modifier le prenom de l'objet et lafficher.
        $objet->prenom = "Aarous";
        $objet->age = 21;

        echo $objet->prenom . "<br>";
        echo $objet->age . "<br>";
        echo $objet->resident() . "<br>";

        // creer un objet animal ensuite declarer les attributs race couleur categorie ainsi que les methodes 
        // manger boire voler courir nager.
        // ensuite creer un dauphin un lion un aigle.

        // class Animal {
        //     public race;
        //     public couleur;
        //     public categorie;

        //     public function manger ($food) {
        //         return $food;
        //     }

        //     public function boire ($fluid) {
        //         return $fuid;
        //     }

        //     public function voler ($fly) {
        //         return $fly;
        //     }

        //     public function courir ($run) {
        //         return $run;
        //     }

        //     public function nager ($swim) {
        //         return $swim;
        //     }
        // }

        // $daulphin = new Animal();

        // $daulphin->race = "mammifères marins";
        // $daulphin->couleur = "bleu";
        // $daulphin->categorie = "poisson";
        // $daulphin->manger("poisson");
        // $daulphin->boire("eau");
        // $daulphin->boire("eau");
        
        phpinfo();