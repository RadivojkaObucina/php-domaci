<?php

class Pruzalac{
    
    public $id;   
    public $imePrezime;   
    
    public function __construct($id=null, $imePrezime=null)
    {
        $this->id = $id;
        $this->imePrezime = $imePrezime;
       
    }

    public static function getAll(Broker $broker)
    {
        $query = "SELECT * FROM pruzalac";
        return $broker->executeQuery($query);
    }

    public static function getById($id,Broker $broker)
    {
        $query = "SELECT * FROM pruzalac WHERE id=$id";
        return $broker->executeQuery($query);
 
    }
}

?>