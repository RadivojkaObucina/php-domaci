<?php



class Termin {
    
    public $id;   
    public $nazivUsluge;   
    public $imePrezimeKlijenta;   
    public $datumTretmana;   
    public $prostorijaSalona;
    
    public function __construct($id=null, $nazivUsluge=null, $imePrezimeKlijenta=null, $datumTretmana=null,  $prostorijaSalona=null)
    {
        $this->id = $id;
        $this->nazivUsluge = $nazivUsluge;
        $this->imePrezimeKlijenta = $imePrezimeKlijenta;
        $this->datumTretmana = $datumTretmana;
        $this->prostorijaSalona = $prostorijaSalona;
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
        $query = "UPDATE termin set usluga = $termin->nazivUsluge, klijent = '$termin->imePrezimeKlijenta', prostorija = $termin->prostorijaSalona, datum = '$termin->datumTretmana' WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public static function add(Termin $termin, Broker $broker)
    {
        $query = "INSERT INTO termin(usluga, klijent, datum, prostorija) VALUES('$termin->nazivUsluge','$termin->imePrezimeKlijenta', ,'$termin->prostorijaSalona', '$termin->datumTretmana')";
        return $broker->executeQuery($query);
    }
}

?>