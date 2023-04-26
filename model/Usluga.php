<?php

class Usluga {
    
    public $id;   
    public $nazivUsluge;   
    public $pruzalac;   
    
    public function __construct($id=null, $nazivUsluge=null, $pruzalac=null)
    {
        $this->id = $id;
        $this->nazivUsluge = $nazivUsluge;
        $this->pruzalac = $pruzalac;
    }



    public static function getAll(Broker $broker)
    {
        $query = "SELECT u.*, p.imePrezime as pruzalac_imePrezime, count(t.id) as broj_termina FROM usluga u 
        INNER JOIN pruzalac p on (u.pruzalac=p.id) LEFT JOIN termin t on (u.id=t.usluga) GROUP BY u.id ORDER BY u.id";
        return $broker->executeQuery($query);
    }

    public static function getById($id,Broker $broker){
        $query = "SELECT * FROM usluga WHERE id=$id";
        return $broker->executeQuery($query);

    }

    public function deleteById(Broker $broker)
    {
        $query = "DELETE FROM usluga WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    # ili da zovemo nad objektom koji menjamo a prosledjujemo id
    public function update(Usluga $usluga,Broker $broker)
    {
        $query = "UPDATE usluga set naziv = '$usluga->nazivUsluge', pruzalac = $usluga->pruzalac WHERE id=$this->id";
        return $broker->executeQuery($query);
    }
  
    public static function add(Usluga $usluga,Broker $broker)
    {
        $query = "INSERT INTO usluga(naziv, pruzalac) VALUES('$usluga->nazivUsluge','$usluga->pruzalac')";
        return $broker->executeQuery($query);
    }
}

?>