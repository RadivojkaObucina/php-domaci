<?php

require "../Broker.php";
require "../model/Termin.php";

$broker=Broker::getBroker();

if(isset($_POST['usluga']) && isset($_POST['klijent']) 
&& isset($_POST['datum']) && isset($_POST['prostorija'])){
    $termin = new Termin(null,$_POST['usluga'],$_POST['klijent'],$_POST['datum'],$_POST['prostorija'] );
    $rezultat = Termin::add($termin, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{ 
         echo '1';
     }
}


?>