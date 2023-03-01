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
        <li><a href="oktato.php" > Oktatófelvétel </a>   </li>
        <li><a href="hallgatok.php" > Hallgatófelvétel </a>   </li>
        <li><a href="./terem.php" > Teremfelvétel </a>   </li>
    </ul>
</nav>

<img class="neonpicgood" src="../img/munkahely.jpg" alt="neon" style="margin-top: 0; scale: 40%">


<div class="login-box">
<h1>Terem felvitele</h1>

<form method="POST" action="../fgv/teremfelvitel.php" accept-charset="utf-8">

    <div class="user-box">
    <input type="text" name="ajtoszam" required="" />
        <label>Ajtószám: </label>
    </div>

    <div class="user-box">
    <input type="number" name="ferohely" required="" />
        <label>Ferohely: </label>
    </div>

    <div class="user-box">
    <label>Épületkód:  </label>
        <select class="select" name="epuletkod">
            <?php
            $epuletek = epuletlistatLeker();
            while( $egySor = mysqli_fetch_assoc($epuletek) ) {
                echo '<option value="'.$egySor["epuletkod"].'">'.
                    $egySor["epuletkod"].'</option>';
            }
            mysqli_free_result($epuletek);

            ?>

        </select>

    </div>

    <a class="btn__submit" style="margin-top: 60px" >
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Elküld" style=" padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px" />
    </a>

</form>
</div>


<h1 style="margin-left: 10%">Termek listája</h1>

<table border="1">
    <tr>
        <th>Ajtó</th>
        <th>Hely</th>
        <th>Épületkód</th>
        <th>Módosít</th>
        <th>Törlés</th>
    </tr>

    <?php

    $termek = teremlistatLeker(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

    while( $egySor = mysqli_fetch_assoc($termek) ) {
        echo '<tr>';
        echo '<td>'. $egySor["ajtoszam"] .'</td>';
        echo '<td>'. $egySor["ferohely"] .'</td>';
        echo '<td>'. $egySor["epuletkod"] .'</td>';

        echo '<td> <form method="POST" action="../frontend/teremszerkeszt.php" accept-charset="utf-8">
   <a class="btn__submit" >
   
    <input type="hidden" name="ajtoszam" value="'.$egySor["ajtoszam"].'" />
    <input type="hidden" name="ferohely" value="'.$egySor["ferohely"].'" />
    <input type="hidden" name="epuletkod" value="'.$egySor["epuletkod"].'" />
   
    <input type="submit" value="Módosít" style="padding: 15px 15px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '<td>  <form method="POST" action="../fgv/teremtorol.php" accept-charset="utf-8">
 <a class="btn__submit" >
    <input type="hidden" name="param" value="'.$egySor["ajtoszam"].'" />
    <input type="hidden" name="param2" value="'.$egySor["epuletkod"].'" />
    <input type="submit" value="Töröl" style="padding: 15px 15px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '</tr>';
    }
    mysqli_free_result($termek); // töröljük a listát a memóriából
    ?>



</table>


</BODY>
</HTML>