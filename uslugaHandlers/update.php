<?php

require "../Broker.php";
require "../model/Usluga.php";

$broker=Broker::getBroker();

if(isset($_POST['naziv']) && isset($_POST['pruzalac']) && isset($_POST['id'])) {

    $uslugaKojaSeMenja = new Usluga($_POST['id'], null, null);
    $uslugaKojomSeMenja = new Usluga(null,$_POST['naziv'],$_POST['pruzalac']);
    $rezultat = $uslugaKojaSeMenja->update($uslugaKojomSeMenja, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{ 
         echo '1';
     }
}

?>