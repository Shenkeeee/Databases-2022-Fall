<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_ehakod = $_POST['ehakod'];

	if (isset($v_ehakod) ) {

		// beszúrjuk az új rekordot az adatbázisba
		$sikeres = oktatot_beszur($v_ehakod);
		if ($sikeres == true) {
			// visszatérünk az index.php-re
			header("Location: ../frontend/oktato.php");
		} else {
			echo "Hiba volt a beszúrásnál";
		}
	} else {
		error_log("Nincs beállítva valamely érték");

	}


?>
