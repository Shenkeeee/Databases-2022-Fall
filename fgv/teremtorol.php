<?php

include_once('db_fuggvenyek.php');

$torolt = $_POST["param"];
$torolt2 = $_POST["param2"]; // epuletkod

if ( isset($torolt) ) {

    $sikeres = terem_torlese($torolt, $torolt2);

    if ( $sikeres ) {
        header('Location: ../frontend/terem.php');
    } else {
        echo 'Hiba történt a kölcsönzés törlése során';
    }

} else {
    echo 'Hiba történt a törlés során';

}

?>