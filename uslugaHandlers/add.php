<?php

require "../Broker.php";
require "../model/Usluga.php";

$broker=Broker::getBroker();

if(isset($_POST['naziv']) && isset($_POST['pruzalac'])) {
    
    $usluga = new Usluga(null,$_POST['naziv'],$_POST['pruzalac']);
    $rezultat = Usluga::add($usluga, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{ 
         echo '1';
     }
}


?>