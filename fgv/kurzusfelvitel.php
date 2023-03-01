<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_kurzuskod= $_POST['kurzuskod'];
$v_mikor = $_POST['mikor'];
$v_jelentkezettszam = $_POST['jelentkezettszam'];
$v_melyiknapon= $_POST['melyiknapon'];
$v_ehakod= $_POST['ehakod'];
$v_ajtoszam= $_POST['ajtoszam'];
$v_epuletkod= $_POST['epuletkod'];

	if ( isset($v_kurzuskod) && isset($v_mikor) && isset($v_jelentkezettszam) && isset($v_melyiknapon) && isset($v_ehakod) && isset($v_ajtoszam) && isset($v_epuletkod)) {

		// beszúrjuk az új rekordot az adatbázisba
		$sikeres = kurzust_beszur($v_kurzuskod, $v_mikor, $v_jelentkezettszam, $v_melyiknapon, $v_ehakod, $v_ajtoszam, $v_epuletkod);
		if ($sikeres == true) {
			// visszatérünk az index.php-re
			header("Location: ../frontend/kurzusindex.php");
		} else {
			echo "Hiba volt a beszúrásnál";
		}
	} else {
		error_log("Nincs beállítva valamely érték");

	}


?>
