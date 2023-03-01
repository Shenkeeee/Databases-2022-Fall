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
        <li> <a  href="./felhasznaloindex.php"> Felhasználófelvétel </a>  </li>
        <li><a href="./kurzusindex.php" > Kurzusfelvétel </a>   </li>
        <li><a href="./oktato.php" > Oktatófelvétel </a>   </li>
        <li><a href="./hallgatok.php" > Hallgatófelvétel </a>   </li>
        <li><a href="./terem.php" > Teremfelvétel </a>   </li>
    </ul>
</nav>

<img class="neonpicgood" src="../img/felhasznalo_auto_x2.jpg" alt="neon" style="margin-top: 0; scale: 40%">
<!--<img class="neonpicgood" src="../img/felhasznalo_auto_x2.jpg" alt="neon" style="margin-top: 0; scale: 40%;float = left">-->
<!--<video class="neonpic" autoplay loop muted src="../img/felhasznalo.mp4"></video>-->


<div class="login-box">
<h1>Felhasználó felvitele</h1>

<form method="POST" action="../fgv/felhasznalofelvitel.php" accept-charset="utf-8">

    <div class="user-box">
    <input type="text" name="ehakod"  required=""/>
        <label>EHA-KÓD: </label>
    </div>

    <div class="user-box">
    <input type="text" name="szuldatum"  required="" />
    <label>Születési dátum: (yyyy-mm-dd) </label>
    </div>

    <div class="user-box">
    <input type="text" name="lakcim"  required="" />
    <label>Lakcím: </label>
    </div>

    <div class="user-box">
    <input type="text" name="nev" required="" />
    <label>Név: </label>
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


<h1 style="margin-left: 5%; padding-top: 3%"> A Felhasználók listája <br> az oldal alján található. </h1>

<table border="1" style="display: inline;margin:0;" >
    <tr>
        <th style="width: 1%">EHAKód</th>
        <th>Szül. Dátum</th>
        <th>Cím</th>
        <th>Név</th>
        <th>Módosít</th>
        <th>Töröl</th>
    </tr>

    <?php

    $felhasznalok = felhasznalolistatLeker(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

    while( $egySor = mysqli_fetch_assoc($felhasznalok) ) {
        echo '<tr>';
        echo '<td>'. $egySor["ehakod"] .'</td>';
        echo '<td>'. $egySor["szuletesidatum"] .'</td>';
        echo '<td>'. $egySor["lakcim"] .'</td>';
        echo '<td>'. $egySor["nev"] .'</td>';


        echo '<td> <form method="POST" action="../frontend/felhasznaloszerkeszt.php" accept-charset="utf-8">
   <a class="btn__submit" >
       <input type="hidden" name="cehakod" value="'.$egySor["ehakod"].'" />
       <input type="hidden" name="szuldatum" value="'.$egySor["szuletesidatum"].'" />
       <input type="hidden" name="lakcim" value="'.$egySor["lakcim"].'" />
       <input type="hidden" name="nev" value="'.$egySor["nev"].'" />
       
    <input type="submit" value="Módosít" style="padding: 15px 30px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '<td>  <form method="POST" action="../fgv/felhasznalotorol.php" accept-charset="utf-8">
 <a class="btn__submit" >
    <input type="hidden" name="param" value="'.$egySor["ehakod"].'" />
    <input type="submit" value="Töröl" style="padding: 15px 30px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '</tr>';
    }
    mysqli_free_result($felhasznalok); // töröljük a listát a memóriából
    ?>



</table>


</BODY>
</HTML>