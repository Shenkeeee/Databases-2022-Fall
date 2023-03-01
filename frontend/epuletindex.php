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

<img class="neonpicgood" src="../img/epuletkep.jpg" style=" margin-right: 4%;" alt="neon">

<div class="login-box">
<h1>Épület felvitele</h1>

<form method="POST" action="../fgv/epuletfelvitel.php" accept-charset="utf-8">

    <div class="user-box">
        <input type="text" name="epuletkod" required=""/>
        <label>Épület kódja: </label>
    </div>

    <div class="user-box" >
        <input type="text" name="cim" required="" />
        <label>Cím: </label>
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




<h1 style="margin-left: 10%">Épületek listája</h1>

<table border="1">
    <tr>
        <th>Épületkód</th>
        <th>Cím</th>
        <th>Módosítás</th>
        <th>Törlés</th>
    </tr>

    <?php

    $epuletek = epuletlistatLeker(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

    while( $egySor = mysqli_fetch_assoc($epuletek) ) {
        echo '<tr>';
    echo '<td>'. $egySor["epuletkod"] .'</td>';
    echo '<td>'. $egySor["cim"] .'</td>';


    echo '<td> <form method="POST" action="../frontend/epuletszerkeszt.php" accept-charset="utf-8">
   <a class="btn__submit" >
    <input type="hidden" name="cEpuletkod" value="'.$egySor["epuletkod"].'" />
    <input type="hidden" name="cCim" value="'.$egySor["cim"].'" />
    <input type="submit" value="Módosít" style="padding: 15px 15px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

    echo '<td>  <form method="POST" action="../fgv/epulettorol.php" accept-charset="utf-8">
 <a class="btn__submit" >
    <input type="hidden" name="param" value="'.$egySor["epuletkod"].'" />
    <input type="submit" value="Töröl" style="padding: 15px 15px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

    echo '</tr>';
    }
    mysqli_free_result($epuletek); // töröljük a listát a memóriából
    ?>

</table>

</BODY>
</HTML>