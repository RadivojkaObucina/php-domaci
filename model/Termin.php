<?php



class Termin {
    
    public $id;   
    public $usluga;   
    public $klijent;   
    public $datum;   
    public $prostorija;
    
    public function __construct($id=null, $usluga=null, $klijent=null, $datum=null,  $prostorija=null)
    {
        $this->id = $id;
        $this->usluga = $usluga;
        $this->klijent = $klijent;
        $this->prostorija = $prostorija;
        $this->datum = $datum;
    }


    public static function getAll(Broker $broker)
    {
        $query = "SELECT t.*, u.naziv as usluga_naziv FROM termin t INNER JOIN usluga u on (t.usluga=u.id)";
        return $broker->executeQuery($query);
    }

    public static function getById($id,Broker $broker){
        $query = "SELECT * FROM termin WHERE id=$id";
        return $broker->executeQuery($query);
    }

    public static function getAllByUsluga($id,Broker $broker){
        $query = "SELECT * FROM termin WHERE usluga=$id";
        return $broker->executeQuery($query);
    }

    public function deleteById(Broker $broker)
    {
        $query = "DELETE FROM termin WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public function update(Termin $termin, Broker $broker)
    {
        $query = "UPDATE termin set usluga = $termin->usluga,klijent = '$termin->klijent',datum = '$termin->datum',prostorija = $termin->prostorija WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public static function add(Termin $termin, Broker $broker)
    {
        $query = "INSERT INTO termin(usluga, klijent, datum, prostorija) VALUES('$termin->usluga','$termin->klijent','$termin->datum','$termin->prostorija')";
        return $broker->executeQuery($query);
    }
}

?>