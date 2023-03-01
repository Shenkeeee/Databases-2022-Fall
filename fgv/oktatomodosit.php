<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_ehakod = $_POST['ehakod'];
$v_alapehakod = $_POST['ehakod'];

	if ( isset($v_ehakod)) {

		// beszúrjuk az új rekordot az adatbázisba
		$sikeres = oktatot_modosit($v_alapehakod,$v_ehakod);
		if ($sikeres == true) {
			// visszatérünk az index.php-re
			header("Location: ../frontend/oktato.php");
		} else {
			echo "Hiba volt a módosításnál";
		}
	} else {
		error_log("Nincs beállítva valamely érték");

	}


?>
