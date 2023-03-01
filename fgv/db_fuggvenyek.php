<?php

function csatlakozas() {
	
	$conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
	if ( false == mysqli_select_db($conn, "etr2" )  ) {
		
		return null;
	}
	
	// a karakterek helyes megjelenítése miatt be kell állítani a karakterkódolást!
	mysqli_query($conn, "SET NAMES UTF8mb4");
	mysqli_query($conn, "SET character_set_results=utf8mb4");
	mysqli_set_charset($conn, 'utf8');
	
	return $conn;
	
}

function epuletet_beszur($epuletkod, $cim) {
	
	
	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO epulet(epuletkod, cim) VALUES (?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss", $epuletkod,  $cim);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

//kulcs nem modosit

//function epuletet_modosit($epuletkod, $cim) {
//
//
//	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
//		return false;
//	}
//
//	// elokeszitjuk az utasitast
//	$stmt = mysqli_prepare( $conn,"UPDATE epulet Set cim=? where ? = epulet.epuletkod");
//
//	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
//	mysqli_stmt_bind_param($stmt, "ss", $cim,  $epuletkod);
//
//	// lefuttatjuk az SQL utasitast
//	$sikeres = mysqli_stmt_execute($stmt);
//		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
//		// vegrehajtani az utasitast
//
//	mysqli_close($conn);
//	return $sikeres;
//
//}

function epuletet_modosit($alapepuletkod, $epuletkod, $cim) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}

	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE epulet Set epuletkod=?, cim=? where ? = epulet.epuletkod");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "sss", $epuletkod,$cim,  $alapepuletkod);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;

}

function felhasznalot_beszur($ehakod, $szuldatum,$lakcim,$nev) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO felhasznalok(ehakod, szuletesidatum,lakcim,nev) VALUES (?, ?, ?, ?)");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ssss", $ehakod,  $szuldatum, $lakcim, $nev);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;

}

function felhasznalot_modosit($alapehakod,$ehakod, $szuldatum,$lakcim,$nev) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"update felhasznalok set ehakod=?, szuletesidatum=?,lakcim=?,nev=? where felhasznalok.ehakod = ?");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "sssss", $ehakod,  $szuldatum, $lakcim, $nev, $alapehakod);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;

}

function kurzust_beszur($kurzuskod, $mikor, $jelentkezettszam, $melyiknapon, $v_ehakod, $v_ajtoszam, $v_epuletkod) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO kurzus(kurzuskod, mikor,jelentkezettszam,melyiknapon, ehakod, ajtoszam, epuletkod) VALUES (?, ?, ?, ?, ?, ?, ?)");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ssdssss", $kurzuskod,  $mikor, $jelentkezettszam, $melyiknapon, $v_ehakod, $v_ajtoszam, $v_epuletkod);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;
}
function kurzust_modosit($alapkurzuskod,$kurzuskod, $mikor, $jelentkezettszam, $melyiknapon, $v_epuletkod, $v_ajtoszam, $v_ehakod) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"update kurzus set kurzuskod=?, mikor=?,jelentkezettszam=?,melyiknapon=?,epuletkod=?,ajtoszam=?,ehakod=? where kurzus.kurzuskod=?");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ssdsssss", $kurzuskod,  $mikor, $jelentkezettszam, $melyiknapon, $v_epuletkod,$v_ajtoszam,$v_ehakod, $alapkurzuskod);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;
}



function termet_beszur($ajtoszam, $ferohely, $epuletkod) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO terem(ajtoszam, ferohely,epuletkod) VALUES (?, ?, ?)");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "sds", $ajtoszam,  $ferohely, $epuletkod);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;

}
function termet_modosit($alapajtoszam,$alapepuletkod, $ajtoszam, $ferohely, $epuletkod) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
//	$stmt = mysqli_prepare( $conn,"update terem set ajtoszam=?, ferohely=?,epuletkod=? where terem.ajtoszam = ? and terem.epuletkod = ?"); // ez kéne
	$stmt = mysqli_prepare( $conn,"update terem set ajtoszam=?, ferohely=?,epuletkod=? where terem.ajtoszam = ?");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
//	mysqli_stmt_bind_param($stmt, "sdsss", $ajtoszam,  $ferohely, $epuletkod, $alapajtoszam, $alapepuletkod);
	mysqli_stmt_bind_param($stmt, "sdss", $ajtoszam,  $ferohely, $epuletkod, $alapajtoszam);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;

}

function oktatot_beszur($ehakod) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO oktato(ehakod) VALUES (?)");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "s", $ehakod);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;

}

function oktatot_modosit($alapehakod, $ehakod) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"update oktato set ehakod=? where oktato.ehakod=? ");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss", $ehakod,  $alapehakod);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;

}

function hallgatot_beszur($ehakod, $atlag) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO hallgatok(ehakod, atlag) VALUES (?, ?)");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss", $ehakod,  $atlag);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;

}

function hallgatot_modosit($alapehakod,$ehakod, $atlag) {


	if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"update hallgatok set ehakod=?, atlag=? where hallgatok.ehakod=? ");

	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "sss", $ehakod,  $atlag,$alapehakod);

	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
		// vegrehajtani az utasitast

	mysqli_close($conn);
	return $sikeres;

}

function epuletlistatLeker() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT epuletkod, cim FROM epulet");

    mysqli_close($conn);
    return $result;
}

function felhasznalolistatLeker() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT ehakod, szuletesidatum,lakcim,nev FROM felhasznalok");

    mysqli_close($conn);
    return $result;
}

function felhasznalohallgatolistatLeker() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT ehakod,nev FROM felhasznalok where felhasznalok.ehakod in (select ehakod from hallgatok order by atlag desc)");

    mysqli_close($conn);
    return $result;
}

//se nem oktato se nem felhasznalo
function szabadfelhasznalolistatLeker() {


    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT ehakod, szuletesidatum,lakcim,nev FROM felhasznalok");

    mysqli_close($conn);
    return $result;
}

function hallgatolistatLeker() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT ehakod,atlag FROM hallgatok");

    mysqli_close($conn);
    return $result;
}

function hallgatolistatLekeratlagrend() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT ehakod,atlag FROM hallgatok order by atlag desc");

    mysqli_close($conn);
    return $result;
}

function idosoktatoleker() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    $list = array();

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT felhasznalok.nev as nev, oktato.ehakod, felhasznalok.szuletesidatum as ido FROM oktato,felhasznalok where oktato.ehakod = felhasznalok.ehakod and oktato.ehakod in (select ehakod from felhasznalok where YEAR(szuletesidatum)<YEAR(CURRENT_DATE)-30) GROUP BY ehakod ");

    mysqli_close($conn);
    return $result;
}

function legelfoglaltabbtanarleker() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT oktato.ehakod,count(kurzus.ehakod) as osszeg, felhasznalok.nev as nev FROM oktato,kurzus,felhasznalok where oktato.ehakod = felhasznalok.ehakod and oktato.ehakod = kurzus.ehakod and oktato.ehakod in (select kurzus.ehakod from kurzus ORDER BY kurzus.ehakod desc) group by oktato.ehakod ORDER BY count(kurzus.ehakod) DESC ");

    mysqli_close($conn);
    return $result;
}

function legjobbatlag() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT hallgatok.ehakod, atlag as legjobbatlag, felhasznalok.nev  as nev, felhasznalok.lakcim as lakcim, felhasznalok.szuletesidatum as szuletesidatum FROM hallgatok,felhasznalok where hallgatok.ehakod = felhasznalok.ehakod and hallgatok.atlag in (select max(atlag) as legjobbatlag from hallgatok) ORDER BY hallgatok.atlag DESC ");

    mysqli_close($conn);
    return $result;
}

function kurzuslistatLeker() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT kurzuskod,mikor,jelentkezettszam,melyiknapon,epuletkod,ajtoszam,ehakod FROM kurzus");

    mysqli_close($conn);
    return $result;
}


function oktatolistatLeker() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT ehakod FROM oktato ORDER BY ehakod asc ");

    mysqli_close($conn);
    return $result;
}


function teremlistatLeker() {

    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT ajtoszam,ferohely,epuletkod FROM terem order by epuletkod, ajtoszam");

    mysqli_close($conn);
    return $result;
}

function epulet_torlese($kulcs) {
    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"DELETE FROM epulet WHERE epuletkod = ?");

//    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "s", $kulcs);

    // lefuttatjuk az SQL utasitast
    $sikeres = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast

    mysqli_close($conn);
    return $sikeres;
}

function felhasznalo_torlese($kulcs) {
    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"DELETE FROM felhasznalok WHERE ehakod = ?");

//    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "s", $kulcs);

    // lefuttatjuk az SQL utasitast
    $sikeres = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast

    mysqli_close($conn);
    return $sikeres;
}

function hallgato_torlese($kulcs) {
    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"DELETE FROM hallgatok WHERE ehakod = ?");

//    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "s", $kulcs);

    // lefuttatjuk az SQL utasitast
    $sikeres = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast

    mysqli_close($conn);
    return $sikeres;
}

function oktato_torlese($kulcs) {
    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
//    $stmt = mysqli_prepare( $conn,"DELETE FROM oktato WHERE ehakod = ?");
    $stmt = mysqli_prepare( $conn,"DELETE FROM oktato WHERE ehakod = ?");

//    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
//    mysqli_stmt_bind_param($stmt, "s", $kulcs);
    mysqli_stmt_bind_param($stmt, "s", $kulcs);

    // lefuttatjuk az SQL utasitast
    $sikeres = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast

    mysqli_close($conn);
    return $sikeres;
}


function kurzus_torlese($kulcs) {
    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"DELETE FROM kurzus WHERE kurzuskod = ?");

//    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "s", $kulcs);

    // lefuttatjuk az SQL utasitast
    $sikeres = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast

    mysqli_close($conn);
    return $sikeres;
}

function terem_torlese($kulcs, $epuletkod) {
    if ( !($conn = csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"DELETE FROM terem WHERE ajtoszam = ? and epuletkod = ?");

//    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
//    mysqli_stmt_bind_param($stmt, "s", $kulcs);
    mysqli_stmt_bind_param($stmt, "ss", $kulcs,$epuletkod);

    // lefuttatjuk az SQL utasitast
    $sikeres = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast

    mysqli_close($conn);
    return $sikeres;
}

