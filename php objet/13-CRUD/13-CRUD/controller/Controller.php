<?php

namespace Controller;

class Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new \model\EntityRepository; // permet de récupérer une connexion à la BDD qui se trouve dans le fichier EntityRepository.php
    }
    public function handlerRequest() // permet de savoir ce que l'internaute demande (afficher/modifier/supprimer), action de l'internaute
    {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL; // si op est défini dans l'URL on le récupère, on le stock dans $op sinon, si rien n'est défini dans l'URL, on stock NULL dans $op
        try
        {
            if($op == 'add' || $op == 'update') $this->save($op); // si on ajoute ou modifie un employé, on appel la méthode save()
            elseif($op == 'select') $this->select(); // si on selectionne un employé, on appel la méthode select()
            elseif($op == 'delete') $this->delete(); // si on supprime un employé, on appel la méthode delete()
            else $this->selectAll(); // permettra d'afficher l'ensemble des employés 
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage()); // permet d'envoyer un message et d'arreter le script si il y a une erreur dans le bloc try
        }
    }
    public function selectAll()
    {
        // echo "Méthode selectAll()";
        // $r = $this->db->selectAll();
        // echo "<pre>" ; print_r($r); echo "</pre>";
        $this->render("layout.php", "donnees.php", array(
            "title"=>"Toutes les données",
            "donnees"=>$this->db->selectAll(),
            "fields"=>$this->db->getFields()
        ));
    }
    // $this->render('layout.php', 'donnees.php', 'parametres');
    public function render($layout, $template, $parameters = array())
    {
        extract($parameters);
        ob_start(); // commence la temporisation, ob_start() démarrer la temporisation de sortie
        require "view/$template";
        // $content = require "view/$template";
        $content = ob_get_clean(); // tout ce qui se trouve dans le template sera stocké dans $content
        // $content = "view/$template";

        ob_start(); // temporiser la sortie de l'affichage
        require "view/$layout";
        return ob_end_flush(); // libérer l'affichage de sortie et fait tout apparaitre sur la page
    }

    public function save($op)
    {
        $title = $op;
        if($_POST)
        {
            $r = $this->db->save(); // lorque l'on valide le formulaire d'ajout, on execute la methode save() du fichier EntityRepository.php
        }
        $this->render('layout.php', 'donnees-form.php', array(
            "title" => "Données : $title",
            "op" => $op,
            "fields" => $this->db->getFields(), // c'est ce qui va nous permettre de récupérer le nom des champs pour les définir de façon générique
            "id" => "id" . ucfirst($this->db->table) // affiche idEmploye, cela servira a pointer sur l'indice idEmploye du tableau de données envoyer dans le layout pour les liens voir/modifier/supprimer
        ));
    }
}

