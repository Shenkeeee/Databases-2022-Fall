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

<!--<img class="neonpicgood" src="../img/felhasznalo_auto_x2.jpg" alt="neon" style="margin-top: 0; scale: 40%">-->
<!--<video class="neonpic" autoplay loop muted src="../img/felhasznalo.mp4"></video>-->


<div class="login-box">
<h1>Felhasználó módosítása</h1>

<form method="POST" action="../fgv/felhasznalomodosit.php" accept-charset="utf-8">

    <div class="user-box">
        <?php
        $ehakod = $_POST["cehakod"];
        $alapehakod = $_POST["cehakod"];
        echo '<input type="text" name="ehakod" required="" value=',$ehakod,' />';
        echo '<input type="hidden" name="alapehakod" required="" value=',$alapehakod,' />'
        ?>
        <label>EHA-KÓD: </label>
    </div>

    <div class="user-box">
        <?php
        $szuldatum = $_POST["szuldatum"];
        echo '<input type="text" name="szuldatum" required="" value=',$szuldatum,' />'
        ?>
    <label>Születési dátum: (yyyy-mm-dd) </label>
    </div>

    <div class="user-box">
        <?php
        $lakcim = $_POST["lakcim"];
        echo '<input type="text" name="lakcim" required="" value=',$lakcim,' />'
        ?>
    <label>Lakcím: </label>
    </div>

    <div class="user-box">
        <?php
        $nev = $_POST["nev"];
        echo '<input type="text" name="nev" required="" value=',$nev,' />'
        ?>
    <label>Név: </label>
    </div>

    <a class="btn__submit" >
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input type="submit" value="Módosít" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px" />
    </a>

    <a href="../frontend/felhasznaloindex.php" class="btn__submit" style="float: right">
        <input type="button" value="Mégse" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px"/>
    </a>

</form>
</div>


</BODY>
</HTML>