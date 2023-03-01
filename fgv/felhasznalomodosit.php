<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_alapehakod = $_POST['alapehakod'];
$v_ehakod = $_POST['ehakod'];
$v_cim = $_POST['lakcim'];
$v_szuldatum = $_POST['szuldatum'];
$v_nev= $_POST['nev'];

	if ( isset($v_cim) && isset($v_ehakod) && isset($v_szuldatum) && isset($v_nev) ) {

		// modositjuk az új rekordot az adatbázisba
		$sikeres = felhasznalot_modosit($v_alapehakod,$v_ehakod, $v_szuldatum, $v_cim, $v_nev);
		if ($sikeres == true) {
			// visszatérünk az index.php-re
			header("Location: ../frontend/felhasznaloindex.php");
		} else {
			echo "Hiba volt a módosításnál";
		}
	} else {
		error_log("Nincs beállítva valamely érték");

	}


?>
