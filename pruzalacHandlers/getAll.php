<?php

require "../model/Pruzalac.php";
require '../Broker.php';

$broker=Broker::getBroker();

    $resultSet = Pruzalac::getAll($broker);
    $response=[];

    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
    } 
    else{
    $response['status']=1;
    while($row=$resultSet->fetch_object()){
        $response['pruzaoci'][]=$row;
    }

    echo json_encode($response);
}

?>