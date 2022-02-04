<?php

//// TIETOKANNASTA LUKEMINEN ////
//// MUODOSTA YHTEYS////

$yhteys=mysqli_connect("localhost", "trtkm20b3", "trtkm20b3");
$ok=mysqli_select_db($yhteys, "trtkm20b3");


$tulos=mysqli_query($yhteys, "select * from katjan_vieraskirja");

?>

<!DOCTYPE html>
<html lang="fin">
<head>
<title>Webit - Ryhmätyö</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">



</head>
<body>


  <div class="header">
  </div>


  <div class="topnav" id="myTopnav">
    <a href="index.php">Tutustu vuokramökkeihin</a>
    <a href="index.php">Varaa lomamökkisi</a>
    <a href="index.php">Anna palautetta</a>
    <a href="index.php">Yhteystiedot</a>
    <a href="Admin/LueTietokannasta.php">Kirjaudu sisään</a>
    <a href="Raportti.html">Ryhmätyön raportti</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

<div class="column" id="">
<br>
<br>
<a href="index.php" class="buttonMokki">Varaa mökki</a>
<br>
<br>
</div>

  <h3>Alppimajan vieraskirja</h3>
<div class="column" id="">
      <form action="TallennaTietokantaan.php" method="post">

        <label for="etunimi">Etunimi</label>
			<input type="text" name="etunimi" placeholder="Etunimi" required>

        <label for="sukunimi">Sukunimi</label>
			<input type="text" name="sukunimi" placeholder="Sukunimi" required>


        <label for="viesti">Viesti</label>
			<textarea maxlength="150" name="viesti" placeholder="Kirjoita tähän...(150 merkkkiä)" style="height:150px"></textarea>
       

	 <input type="submit" value="LÄHETÄ">
      </form>
</div>

<div class="column" id="turvallisuus">
<h3>Meillä asioit turvallisesti</h3>
<p>Haluamme, että meillä on turvallista asioida: olemme mm. tehostaneet tilojemme
  siivousta ja tehneet toimenpiteitä varmistaaksemme henkilöstömme ja
  asiakkaidemme suojaamisen.
<br>
<br>Yhteisen turvallisuutemme vuoksi suosittelemme kasvomaskin käyttöä aina
saapuessasi ja asioidessasi meillä. Oikein käytettynä maski vähentää tartuntariskiä
 ja suojelee sekä kantajaansa että hänen kohtaamiaan henkilöitä mahdolliselta
 altistumiselta.</p>

</div>


<div class="" id="reunat">
<br>
<br>
</div>

<div class="" id="vieraskirja">
<br>
<br>

<?php
//// TULOSTETAAN VIERASKIRJA LOMAKKEEN ALLE
include "LueTietokannasta.php";

?>
</div>




<div class="form-popup" id="uutiskirje">
  <form action="https://printvalues-294008.appspot.com/printvalues" class="form-container" method="post">
    <h3>Tilaa uutiskirje</h3>
	<p>Uutiskirjeen tilaajana saat ensimmÃ¤isten joukossa ajankohtaista tietoa uusista palveluista ja kuukausittain vaihtuvista tarjouksista.</p>
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="tilaa@kirje.com" name="email" required>
    <button type="submit" class="btn">Tilaa</button>
    <button type="button" class="btn cancel" onclick="suljeLomake()">Sulje</button>
  </form>
</div>

<div class="" id="reunat">
<br>
<br>
</div>

<div class="footer" id="">
<br>
<br>
</div>

</body>
</html>

