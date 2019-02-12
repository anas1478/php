<?php
namespace Controller;
class Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new \model\EntityRepository;
    }
    public function handlerRequest()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL;
        try
        {
            if($op == 'add' || $op =='update') $this->save($op);
            elseif($op == 'select') $this ->select();
            elseif($op == 'delete') $this ->delete();
            else $this->selectAll();
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }
      
    }
    public function selectAll()
    {
        // echo'Methode selectAll()';
        // $r = $this->db->selectAll();
        // echo"<pre>";print_r($r);echo"</pre>";
        $this->render('layout.php','donnees.php',array(
            'titre'=>'toutes les données',
            'donnees'=>$this->db->selectAll(),
            'fields'=> $this->db->getFields()
        ));
    }
    public function render($layout,$template,$parmeters = array())
    {
        extract($parmeters);
        ob_start();
        require "view/$template";
        $content = ob_get_clean();

        ob_start();
        require "view/$layout";
        return ob_end_flush();
    }
}