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

<!--<img class="neonpicgood" src="../img/konyv.png" alt="neon" style="margin-top: 0; scale: 40%">-->



<div class="login-box">
<h1>Kurzus Módosítása</h1>

<form method="POST" action="../fgv/kurzusmodosit.php" accept-charset="utf-8">

    <div class="user-box">
        <?php
        $kurzuskod = $_POST["kurzuskod"];
        $alapkurzuskod = $_POST["kurzuskod"];
        echo '<input type="text" name="kurzuskod" required="" value=',$kurzuskod,' />';
        echo '<input type="hidden" name="alapkurzuskod" required="" value=',$alapkurzuskod,' />'
        ?>
        <label>Kurzuskód: </label>
    </div>

    <div class="user-box">
        <?php
        $mikor = $_POST["mikor"];
        echo '<input type="text" name="mikor" required="" value=',$mikor,' />'
        ?>
        <label>Mikor: (hh:mm:ss) </label>
    </div>

    <div class="user-box">
        <?php
        $jelentkezettszam = $_POST["jelentkezettszam"];
        echo '<input type="number" name="jelentkezettszam" required="" value=',$jelentkezettszam,' />'
        ?>
        <label>Jelentkezettek száma:  </label>
    </div>

    <div class="user-box">
        <?php
        $melyiknapon = $_POST["melyiknapon"];
        echo '<input type="text" name="melyiknapon" required="" value=',$melyiknapon,' />'
        ?>

        <label>Melyik napon: </label>
    </div>

    <label>Épületkód: </label>
    <select class="select" name="epuletkod">
        <?php
        //            idk how to give this to lil boy hallgatomodosit my friend
        $epuletkod = $_POST["epuletkod"];
//        $alapepuletkod = $_POST["epuletkod"];

        echo '<option name="epuletkod" value=',$epuletkod,'>',$epuletkod,'</option>';

        //hallgatok
        $adatok = epuletlistatLeker();
        while( $egySor = mysqli_fetch_assoc($adatok) ) {
            if( $egySor["epuletkod"] != $epuletkod)
                echo '<option value="'.$egySor["epuletkod"].'">'.
                    $egySor["epuletkod"].'</option>';
        }
        mysqli_free_result($adatok);

        ?>
    </select>

    <label>Ajtószám: </label>
    <select class="select" name="ajtoszam">
        <?php
        //            idk how to give this to lil boy hallgatomodosit my friend
        $ajtoszam = $_POST["ajtoszam"];
//        $alapehakod = $_POST["ajtoszam"];

        echo '<option name="ehakod" value=',$ajtoszam,'>',$ajtoszam,'</option>';

        //hallgatok
        $adatok = teremlistatLeker();
        while( $egySor = mysqli_fetch_assoc($adatok) ) {
            if( $egySor["ajtoszam"] != $ajtoszam)
                echo '<option value="'.$egySor["ajtoszam"].'">'.
                    $egySor["ajtoszam"].'</option>';
        }
        mysqli_free_result($adatok);

        ?>
    </select>

    <label>EHA-kód: </label>
    <select class="select" name="ehakod">
        <?php
        //            idk how to give this to lil boy hallgatomodosit my friend
        $ehakod = $_POST["ehakod"];
//        $alapehakod = $_POST["ehakod"];

        echo '<option name="ehakod" value=',$ehakod,'>',$ehakod,'</option>';

        //hallgatok
        $felhasznalok = oktatolistatLeker();
        while( $egySor = mysqli_fetch_assoc($felhasznalok) ) {
            if( $egySor["ehakod"] != $ehakod)
                echo '<option value="'.$egySor["ehakod"].'">'.
                    $egySor["ehakod"].'</option>';
        }
        mysqli_free_result($felhasznalok);

        ?>
    </select>

    <a class="btn__submit" >
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Módosít" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px" />
    </a>

    <a href="../frontend/kurzusindex.php" class="btn__submit" style="float: right">
        <input type="button" value="Mégse" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px"/>
    </a>

</form>
</div>


</BODY>
</HTML>