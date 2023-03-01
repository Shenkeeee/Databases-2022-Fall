<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_ajtoszam= $_POST['ajtoszam'];
$v_ferohely = $_POST['ferohely'];
$v_epuletkod = $_POST['epuletkod'];

	if ( isset($v_epuletkod) && isset($v_ferohely) && isset($v_ajtoszam)) {

		// beszúrjuk az új rekordot az adatbázisba
		$sikeres = termet_beszur($v_ajtoszam, $v_ferohely, $v_epuletkod);
		if ($sikeres == true) {
			// visszatérünk az index.php-re
			header("Location: ../frontend/terem.php");
		} else {
			echo "Hiba volt a beszúrásnál";
		}
	} else {
		error_log("Nincs beállítva valamely érték");

	}


?>
