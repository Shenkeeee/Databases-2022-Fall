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

<!--<img class="neonpicgood" src="../img/oktato.png" alt="neon" style="margin-top: 0; scale: 40%">-->


<div class="login-box">
<h1>Oktató és óra módosítása</h1>

<form method="POST" action="../fgv/oktatomodosit.php" accept-charset="utf-8">

    <label>EHA-kód: </label>
    <select class="select" name="ehakod" name="alapehakod">
        <?php

        $ehakod = $_POST["ehakod"];
        $alapehakod = $_POST["ehakod"];

        echo '<option value="'.$ehakod.'">'.$ehakod.'</option>';

        $felhasznalok = felhasznalolistatLeker();
        while( $egySor = mysqli_fetch_assoc($felhasznalok) ) {
            if( $egySor["ehakod"] != $ehakod)
            echo '<option value='.$egySor["ehakod"].'>'.
                $egySor["ehakod"].'</option>';
        }
        mysqli_free_result($felhasznalok);

        ?>

    </select>


    </select>
    <br>

    <a class="btn__submit"  >
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Módosít" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px" />
    </a>

    <a href="../frontend/oktato.php" class="btn__submit" style="float: right">
        <input type="button" value="Mégse" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px"/>
    </a>
</form>
</div>



</BODY>
</HTML>