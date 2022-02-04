<?php

//// TIETOKANNASTA LUKEMINEN ////
//// MUODOSTA YHTEYS////

$yhteys=mysqli_connect("localhost", "trtkm20b3", "trtkm20b3");
$ok=mysqli_select_db($yhteys, "trtkm20b3");


$tulos=mysqli_query($yhteys, "select * from katjan_vieraskirja ORDER BY aika DESC");

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

<div class="column" id="section1">
<br>
<br>
<br>
<br>
</div>

<div class="column" id="">
<br>
<br>

<?php

print "<table border='1'>";
print "<tr> <td>Etunimi <td>Sukunimi <td>Jätetty Viesti <td>Viesti on jätetty:";

while ($rivi=mysqli_fetch_object($tulos)){
	print "<tr><td>$rivi->etunimi <td>$rivi->sukunimi <td>$rivi->viesti <td>($rivi->aika)";
        print "<td><a href='PoistaTietokannasta.php?poistettava=$rivi->id'>Poista</a>";
	print "<td><a href='muokkaaTietokantaa2.php?muokattava=$rivi->id'>Muokkaa</a>";
		
}
print "</table>";

mysqli_stmt_close($stmt);
mysqli_close($yhteys); 

?>
<a href="http://shell.hamk.fi/~katja1316/Ryhmatyo2.5/index.php">Palaa takaisin vieraskirjaan.</a>
</div>

<div class="column" id="section1">
<br>
<br>
<br>
<br>
</div>



</body>
</html>















