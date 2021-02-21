<?php

$offices = array(
    array(
        "office" => "ad"
    ),
    array(
        "office" => "ict"
    ),
    array(
        "office" => "aa"
    ),
    array(
        "office" => "mdr"
    ),
    array(
        "office" => "ad"
    ),
    
);

$validoffice = "hr";

foreach($offices as $office){
    if($office['office'] == $validoffice){
        $hrokay = 1;
    } 
}

if(!isset($hrokay)){
    echo "not HR";
    return;
}

// echo array_sum($hrokay);

echo "Good";



?>
