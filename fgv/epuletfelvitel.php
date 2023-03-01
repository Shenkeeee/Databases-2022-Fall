<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

//$v_szerzo = $_POST['szerzo'];
$v_epuletkod = $_POST['epuletkod'];
$v_cim = $_POST['cim'];
//$v_kiado = $_POST['kiado'];
//$v_ev = $_POST['ev'];

//if ( isset($v_szerzo) && isset($v_konyvszam) &&
//     isset($v_cim) && isset($v_kiado) && isset($v_ev) ) {

	if ( isset($v_cim) && isset($v_epuletkod)) {

		// beszúrjuk az új rekordot az adatbázisba
		$sikeres = epuletet_beszur($v_epuletkod, $v_cim);
		if ($sikeres == true) {
			// visszatérünk az index.php-re
			header("Location: ../frontend/epuletindex.php");
		} else {
			echo "Hiba volt a beszúrásnál";
		}
	} else {
		error_log("Nincs beállítva valamely érték");

	}


?>
