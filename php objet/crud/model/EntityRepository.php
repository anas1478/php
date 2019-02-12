<?php
namespace model;

class EntityRepository
 {
     private $db;
     public $table;
     public function getDb()//methode pour  pdo et cree un objet
     {
         if(!$this->db) //seulment si $this->db n'est pas rempli,si il n'a pas de connexin , on la cree
         {
            try
            {
                $xml = simplexml_load_file('app/config.xml');//cett fonction permet de transformer le xml en objet
                //echo '<pre>'; var_dump($xml);echo'</pre>';
                $this->table= $xml->table;//
                try
                {
                    $this->db = new \PDO("mysql:dbname=" . $xml->db .";host=" .$xml->host, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
                    // var_dump($this->db);
                }
                catch(\PDOException $e)
                {
                    die('probleme bdd : '. $e->getMessage());
                }
            }
            catch(\PDOException $e)
            {
                die('probleme de fichier xml manquant');
            }
         }
         return $this->db;//on retourne la connection
     }
     public function getFields()
     {
         $q = $this->getDb()->query('DESC '. $this->table);
         $r= $q->fetchAll(\PDO::FETCH_ASSOC);
         return $r;
     }
     public function selectAll()
         {
             $q = $this->getDb()->query("SELECT * FROM " .$this->table);
             $r= $q->fetchAll(\PDO::FETCH_ASSOC);
             return $r;
         }
     
 }

 $m=new EntityRepository;

 $m->getDb();