<?php

class Pruzalac{
    
    public $id;   
    public $imePrezimePruzaocaUsluge;   
    
    public function __construct($id=null, $imePrezimePruzaocaUsluge=null)
    {
        $this->id = $id;
        $this->imePrezimePruzaocaUsluge = $imePrezimePruzaocaUsluge;
       
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