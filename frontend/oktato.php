<?php
include_once('../fgv/db_fuggvenyek.php');
?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
    <link rel="stylesheet" href="../css/mainSiteCSS.css">
    <link rel="stylesheet" href="../css/style.css">

    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <style>
        label {
            margin: 5px;
            padding: 5px;
            text-align: left;
            display: inline-block;
            min-width: 120px;
        }

        input {
            margin: 5px;
            padding: 5px;
            text-align: left;
            display: inline-flex;
            vertical-align: bottom;
        }
    </style>
</HEAD>
<BODY>

<nav>
    <ul>
        <li>  <a  href="./epuletindex.php" > Épületfelvétel </a> </li>
        <li> <a  href="felhasznaloindex.php"> Felhasználófelvétel </a>  </li>
        <li><a href="kurzusindex.php" > Kurzusfelvétel </a>   </li>
        <li><a href="./oktato.php" > Oktatófelvétel </a>   </li>
        <li><a href="hallgatok.php" > Hallgatófelvétel </a>   </li>
        <li><a href="./terem.php" > Teremfelvétel </a>   </li>
    </ul>
</nav>

<img class="neonpicgood" src="../img/oktato.png" alt="neon" style="margin-top: 0; scale: 40%">


<div class="login-box">
<h1>Oktató felvitele</h1>

<form method="POST" action="../fgv/oktatofelvitel.php" accept-charset="utf-8">

    <label>EHA-kód: </label>
    <select class="select" name="ehakod">
        <?php
        $felhasznalok = felhasznalolistatLeker();
        while( $egySor = mysqli_fetch_assoc($felhasznalok) ) {
            echo '<option value="'.$egySor["ehakod"].'">'.
                $egySor["ehakod"].'</option>';
        }
        mysqli_free_result($felhasznalok);

        ?>

    </select>


    <a class="btn__submit"  >
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Elküld" style=" padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px" />
    </a>

</form>
</div>



<h1 style="margin-left: 10%">Oktatók listája</h1>

<table border="1">
    <tr>
        <th>EHA-Kód</th>
        <th>Módosítás</th>
        <th>Törlés</th>
    </tr>

    <?php

    $oktatok = oktatolistatLeker(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

    while( $egySor = mysqli_fetch_assoc($oktatok) ) {
        echo '<tr>';
        echo '<td>'. $egySor["ehakod"] .'</td>';

        echo '<td> <form method="POST" action="../frontend/oktatoszerkeszt.php" accept-charset="utf-8">
   <a class="btn__submit" >
   
      <input type="hidden" name="ehakod" value="'.$egySor["ehakod"].'" />
       
    <input type="submit" value="Módosít" style="padding: 15px 15px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '<td>  <form method="POST" action="../fgv/oktatotorol.php" accept-charset="utf-8">
 <a class="btn__submit" >
    <input type="hidden" name="param" value="'.$egySor["ehakod"].'" />
    <input type="submit" value="Töröl" style="padding: 15px 15px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '</tr>';
    }
    mysqli_free_result($oktatok); // töröljük a listát a memóriából
    ?>


</table>
<h1 style="padding-top: 40%;margin-left: 2%">A 30 évesnél idosebb Oktatók listája</h1>

<table border="1" style="display: inline">
    <tr>
        <th>EHA-Kód</th>
        <th>Név</th>
        <th>Születési Dátum</th>
    </tr>

    <?php

    $oktatok = idosoktatoleker(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

    while( $egySor = mysqli_fetch_assoc($oktatok) ) {
        echo '<tr>';
        echo '<td>'. $egySor["ehakod"] .'</td>';
        echo '<td>'. $egySor["nev"] .'</td>';
        echo '<td>'. $egySor["ido"] .'</td>';



        echo '</tr>';
    }
    mysqli_free_result($oktatok); // töröljük a listát a memóriából
    ?>


</table>

<h1 style="margin-left: 2%">Hány órát tart egy oktató összesen? Ki tartja a legtöbbet?</h1>

<table border="1" style="display: inline">
    <tr>
        <th>EHA-Kód</th>
        <th>Név</th>
        <th>ÓraDB</th>
    </tr>

    <?php

    $oktatok = legelfoglaltabbtanarleker(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

    while( $egySor = mysqli_fetch_assoc($oktatok) ) {
        echo '<tr>';
        echo '<td>'. $egySor["ehakod"] .'</td>';
        echo '<td>'. $egySor["nev"] .'</td>';
        echo '<td>'. $egySor["osszeg"] .'</td>';



        echo '</tr>';
    }
    mysqli_free_result($oktatok); // töröljük a listát a memóriából
    ?>


</table>





</BODY>
</HTML>