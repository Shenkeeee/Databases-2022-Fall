<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_kurzuskod= $_POST['kurzuskod'];
$v_alapkurzuskod= $_POST['alapkurzuskod'];
$v_mikor = $_POST['mikor'];
$v_jelentkezettszam = $_POST['jelentkezettszam'];
$v_melyiknapon= $_POST['melyiknapon'];
$v_epuletkod= $_POST['epuletkod'];
$v_ajtoszam= $_POST['ajtoszam'];
$v_ehakod= $_POST['ehakod'];

if ( isset($v_kurzuskod) && isset($v_mikor) && isset($v_jelentkezettszam) && isset($v_melyiknapon) && isset($v_epuletkod) && isset($v_ajtoszam) && isset($v_ehakod)) {

		// modositjuk az új rekordot az adatbázisba
		$sikeres = kurzust_modosit($v_alapkurzuskod,$v_kurzuskod, $v_mikor, $v_jelentkezettszam, $v_melyiknapon, $v_epuletkod, $v_ajtoszam, $v_ehakod);
		if ($sikeres == true) {
			// visszatérünk az index.php-re
			header("Location: ../frontend/kurzusindex.php");
		} else {
			echo "Hiba volt a módosításnál";
		}
	} else {
		error_log("Nincs beállítva valamely érték");

	}


?>
