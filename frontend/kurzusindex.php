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
        <li><a href="hallgatok.php" > Hallgatófelvétel </a>   </li>
        <li><a href="./terem.php" > Teremfelvétel </a>   </li>
    </ul>
</nav>

<img class="neonpicgood" src="../img/konyv.png" alt="neon" style="margin-top: 0; scale: 40%">



<div class="login-box">
<h1>Kurzus felvitele</h1>

<form method="POST" action="../fgv/kurzusfelvitel.php" accept-charset="utf-8">

    <div class="user-box">
    <input type="text" name="kurzuskod" required="" />
        <label>Kurzuskód: </label>
    </div>

    <div class="user-box">
    <input type="text" name="mikor" required="" />
        <label>Mikor: (hh:mm:ss) </label>
    </div>

    <div class="user-box">
    <input type="number" name="jelentkezettszam" required="" />
        <label>Jelentkezettek száma:  </label>
    </div>

    <div class="user-box">
    <input type="text" name="melyiknapon" required=""/>
        <label>Melyik napon: </label>
    </div>

    <label>Épületkód: </label>

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

    <label>Ajtószám:  </label>
    <select class="select" name="ajtoszam" >

        <?php
        $termek = teremlistatLeker();
        while( $egySor = mysqli_fetch_assoc($termek) ) {
            echo '<option value="'.$egySor["ajtoszam"].'">'.
                $egySor["ajtoszam"].'</option>';
        }
        mysqli_free_result($termek);

        ?>

    </select>
    <br>

    <label>EHA-kód: </label>
    <select class="select" name="ehakod">
        <?php
        $felhasznalok = oktatolistatLeker();
        while( $egySor = mysqli_fetch_assoc($felhasznalok) ) {
            echo '<option value="'.$egySor["ehakod"].'">'.
                $egySor["ehakod"].'</option>';
        }
        mysqli_free_result($felhasznalok);

        ?>

    </select>
    <br>

    <a class="btn__submit" >
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Elküld" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px" />
    </a>

</form>
</div>


<h1 style="margin-left: 5%; padding-top: 3%">A Kurzusok listája <br> az oldal alján található.</h1>

<table border="1" style="display: inline; margin:0;">
    <tr>
        <th>Kurzuskód</th>
        <th>Mikor</th>
        <th>Jelentkezettek száma</th>
        <th>Melyik napon</th>
        <th>Épületkód</th>
        <th>Ajtószám</th>
        <th>EHA-kód</th>
        <th>Módosítás</th>
        <th>Törlés</th>
    </tr>

    <?php

    $kurzusok = kurzuslistatLeker(); // ez egy eredményhalmazt ad vissza

    // soronként dolgozzuk fel az eredményt
    // minden sort egy asszociatív tömbben kapunk meg

    while( $egySor = mysqli_fetch_assoc($kurzusok) ) {
        echo '<tr>';
        echo '<td>'. $egySor["kurzuskod"] .'</td>';
        echo '<td>'. $egySor["mikor"] .'</td>';
        echo '<td>'. $egySor["jelentkezettszam"] .'</td>';
        echo '<td>'. $egySor["melyiknapon"] .'</td>';
        echo '<td>'. $egySor["epuletkod"] .'</td>';
        echo '<td>'. $egySor["ajtoszam"] .'</td>';
        echo '<td>'. $egySor["ehakod"] .'</td>';

        echo '<td> <form method="POST" action="../frontend/kurzusszerkeszt.php" accept-charset="utf-8">
   <a class="btn__submit" >
   
   <input type="hidden" name="kurzuskod" value="'.$egySor["kurzuskod"].'" />
       <input type="hidden" name="mikor" value="'.$egySor["mikor"].'" />
       <input type="hidden" name="jelentkezettszam" value="'.$egySor["jelentkezettszam"].'" />
       <input type="hidden" name="melyiknapon" value="'.$egySor["melyiknapon"].'" />
       <input type="hidden" name="ehakod" value="'.$egySor["ehakod"].'" />
       <input type="hidden" name="epuletkod" value="'.$egySor["epuletkod"].'" />
       <input type="hidden" name="ajtoszam" value="'.$egySor["ajtoszam"].'" />
       
    <input type="submit" value="Módosít" style="padding: 15px 20px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '<td>  <form method="POST" action="../fgv/kurzustorol.php" accept-charset="utf-8">
 <a class="btn__submit" >
    <input type="hidden" name="param" value="'.$egySor["kurzuskod"].'" />
    <input type="submit" value="Töröl" style="padding: 15px 20px;	background: none; border: none; color: white;font-size: 18px" />
    </a>
    </form>
    </td>';

        echo '</tr>';
    }
    mysqli_free_result($kurzusok); // töröljük a listát a memóriából
    ?>


</table>


</BODY>
</HTML>