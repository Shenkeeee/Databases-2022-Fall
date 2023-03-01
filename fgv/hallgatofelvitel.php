<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_ehakod = $_POST['ehakod'];
$v_atlag= $_POST['atlag'];

	if ( isset($v_ehakod) && isset($v_atlag)) {

		// beszúrjuk az új rekordot az adatbázisba
		$sikeres = hallgatot_beszur($v_ehakod, $v_atlag);
		if ($sikeres == true) {
			// visszatérünk az index.php-re
			header("Location: ../frontend/hallgatok.php");
		} else {
			echo "Hiba volt a beszúrásnál";
		}
	} else {
		error_log("Nincs beállítva valamely érték");

	}


?>
