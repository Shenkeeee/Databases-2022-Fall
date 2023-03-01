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
        <li><a href="./kurzusindex.php" > Kurzusfelvétel </a>   </li>
        <li><a href="./oktato.php" > Oktatófelvétel </a>   </li>
        <li><a href="./hallgatok.php" > Hallgatófelvétel </a>   </li>
        <li><a href="./terem.php" > Teremfelvétel </a>   </li>
    </ul>
</nav>

<img class="neonpicgood" src="../img/hallgato.jpg" alt="neon" style="margin-top: 0; scale: 40%">



<div class="login-box">
<h1>Hallgató felvitele</h1>


<form method="POST" action="../fgv/hallgatofelvitel.php" accept-charset="utf-8">


    <label>EHA-kód: </label>
        <select class="select" name="ehakod">
            <?php
            $felhasznalok = szabadfelhasznalolistatLeker();
            while( $egySor = mysqli_fetch_assoc($felhasznalok) ) {
                echo '<option value="'.$egySor["ehakod"].'">'.
                    $egySor["ehakod"].'</option>';
            }
            mysqli_free_result($felhasznalok);

            ?>

        </select>


    <div class="user-box"  >
        <input style="margin-top: 40px" type="text" name="atlag" required="" />
        <label style="margin-top: 40px">Átlag (x.xx) </label>
    </div>

    <a class="btn__submit" >
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Elküld" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px" />
    </a>
</form>
</div>




<h1 style="margin-left: 10%">Hallgatók listája</h1>

<table border="1">
    <tr>
        <th>EHA-Kód</th>
        <th>Átlag</th>
        <th>Módosítás</th>
        <th>Törlés</th>
    </tr>

    <?php

    $hallgatok = hallgatolistatLeker(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

    while( $egySor = mysqli_fetch_assoc($hallgatok) ) {
        echo '<tr>';
        echo '<td>'. $egySor["ehakod"] .'</td>';
        echo '<td>'. $egySor["atlag"] .'</td>';

        echo '<td> <form method="POST" action="../frontend/hallgatokszerkeszt.php" accept-charset="utf-8">
   <a class="btn__submit" >
   
        <input type="hidden" name="ehakod" value="'.$egySor["ehakod"].'" />
       <input type="hidden" name="atlag" value="'.$egySor["atlag"].'" />
   
    <input type="submit" value="Módosít" style="padding: 15px 15px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '<td>  <form method="POST" action="../fgv/hallgatotorol.php" accept-charset="utf-8">
 <a class="btn__submit" >
    <input type="hidden" name="param" value="'.$egySor["ehakod"].'" />
    <input type="submit" value="Töröl" style="padding: 15px 15px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '</tr>';
    }
    mysqli_free_result($hallgatok); // töröljük a listát a memóriából
    ?>


</table>
<h1 style="margin-left: 2%" >5 Legjobb átlagú Hallgató nevei</h1>

<table border="1" style="display: inline;">
    <tr>
        <th>Név</th>
        <th>EHA-Kód</th>
        <th>Átlag</th>
    </tr>

    <?php

    $hallgatok = hallgatolistatLekeratlagrend(); // ez egy eredményhalmazt ad vissza
    $felhasznalohallgatok = felhasznalohallgatolistatLeker(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

//    felhasznalok kinyerese egy listaba
    $index =0;
    while($felhk[$index] = mysqli_fetch_assoc($felhasznalohallgatok))
    {
        $index++;
    }


$i =0;
    while( 5>$i ) { //5 legjobb
        $egySor = mysqli_fetch_assoc($hallgatok);
        echo '<tr>';

        $index =0;
        $ketSor = $felhk[$index]; // nezem az elso sort

        while($egySor["ehakod"] !== $ketSor["ehakod"] &&  $ketSor = $felhk[$index])
        {
            // mindig a kovi sor lesz.. a kovi
            $index++;
        }
        echo '<td>'. $ketSor["nev"] .'</td>';
        echo '<td>'. $egySor["ehakod"] .'</td>';
        echo '<td>'. $egySor["atlag"] .'</td>';

        $i++;
    }
    mysqli_free_result($hallgatok); // töröljük a listát a memóriából


    ?>


</table>


<h1 style="margin-left: 2%">Legjobb átlagú diák adatai</h1>

<table border="1" style="display: inline; padding: 0; margin: 0">
    <tr>
        <th >Átlag</th>
        <th>Név</th>
        <th>EHA-Kód</th>
        <th>Cím</th>
        <th>Dátum</th>
    </tr>

    <?php

    $hallgatok= legjobbatlag(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

    while( $egySor = mysqli_fetch_assoc($hallgatok) ) {
        echo '<tr>';
        echo '<td width="10%" >'. $egySor["legjobbatlag"] .'</td>';
        echo '<td>'. $egySor["nev"] .'</td>';
        echo '<td>'. $egySor["ehakod"] .'</td>';
        echo '<td>'. $egySor["lakcim"] .'</td>';
        echo '<td>'. $egySor["szuletesidatum"] .'</td>';



        echo '</tr>';
    }
    mysqli_free_result($hallgatok); // töröljük a listát a memóriából
    ?>


</table>
</BODY>
</HTML>