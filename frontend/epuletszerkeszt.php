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

<!--<img class="neonpicgood" src="../img/epuletkep.jpg" style=" margin-right: 4%;" alt="neon">-->

<div class="login-box">
<h1>Épület szerkesztése</h1>



<form method="POST" action="../fgv/epuletmodosit.php" accept-charset="utf-8">

<!--c = current-->

    <div class="user-box">
        <?php
        $cEpuletkod = $_POST["cEpuletkod"];
        $cAlapEpuletKod = $_POST["cEpuletkod"];
        echo '<input type="text" name="epuletkod" required="" value=',$cEpuletkod,' />';
        echo '<input type="hidden" name="alapepuletkod" required="" value=',$cAlapEpuletKod,' />'
        ?>
        <label>Épület kódja: </label>
    </div>

    <div class="user-box" >

        <?php
        $cCim = $_POST["cCim"];
        echo '<input type="text" name="cim" required="" value=',$cCim,' />'
        ?>
        <label>Cím: </label>
    </div>

    <a class="btn__submit" >
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    <input type="submit" value="Módosít" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px" />
    </a>

    <a href="../frontend/epuletindex.php" class="btn__submit" style="float: right">
        <input type="button" value="Mégse" style="padding: 15px 15px;font-family:'Outfit',sans-serif;	background: none; border: none; color: white;font-size: 18px"/>
    </a>

</form>



</div>

</BODY>
</HTML>