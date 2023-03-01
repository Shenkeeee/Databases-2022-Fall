<?php

include_once('db_fuggvenyek.php');

$torolt = $_POST["param"];

if ( isset($torolt) ) {

    $sikeres = oktato_torlese($torolt);

    if ( $sikeres ) {
        header('Location: ../frontend/oktato.php');
    } else {
        echo 'Hiba történt a kölcsönzés törlése során';
    }

} else {
    echo 'Hiba történt a törlés során';

}

?>