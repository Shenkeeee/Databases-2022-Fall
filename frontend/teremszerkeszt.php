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

<!--<img class="neonpicgood" src="../img/munkahely.jpg" alt="neon" style="margin-top: 0; scale: 40%">-->


<div class="login-box">
<h1>Terem módosítása</h1>

<form method="POST" action="../fgv/teremmodosit.php" accept-charset="utf-8">

    <div class="user-box">
        <?php
        $ajtoszam = $_POST["ajtoszam"];
        $alapajtoszam = $_POST["ajtoszam"];

        echo '<input type="text" name="ajtoszam" required="" value=',$ajtoszam,' />';
        echo '<input type="hidden" name="alapajtoszam" required="" value=',$alapajtoszam,' />'

        ?>
        <label>Ajtószám: </label>
    </div>

    <div class="user-box">
        <?php
        $ferohely = $_POST["ferohely"];
        echo '<input type="number" name="ferohely" required="" value=',$ferohely,' />'
        ?>
        <label>Ferohely: </label>
    </div>

    <div class="user-box">
    <label>Épületkód:  </label>
        <select class="select" name="epuletkod">
            <?php
            $epuletkod = $_POST["epuletkod"];
            $alapepuletkod = $_POST["epuletkod"];

//            echo '<input type="hidden" name="alapepuletkod" required="" value=',$alapepuletkod,' />';

            echo '<option value=',$epuletkod,'>',$epuletkod,'</option>';


            $epuletek = epuletlistatLeker();
            while( $egySor = mysqli_fetch_assoc($epuletek) ) {
                if( $egySor["epuletkod"] != $epuletkod)
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
        <input type="submit" value="Módosít" style=" padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px" />
    </a>



</form>
    <a
            href="../frontend/terem.php" class="btn__submit" style="float: left">
        <input type="button" value="Mégse" style="padding: 15px 15px; font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px"/>
    </a>
</div>


</BODY>
</HTML>