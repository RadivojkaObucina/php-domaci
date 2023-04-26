<?php

require "../Broker.php";
require "../model/Usluga.php";

$broker=Broker::getBroker();

if(isset($_POST['id'])){
    $usluga = new Usluga($_POST['id']);
    $rezultat = $usluga->deleteById($broker);
    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{
         echo '1';
     }
}

?>