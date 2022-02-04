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


<div class="column_vk" id="">
<br>
<br>

<?php

print "<table border='1'>";
print "<tr> <th>  <th style='text-align:right'> Viesti on jätetty: ";

while ($rivi=mysqli_fetch_object($tulos)){
	print "<tr><th>$rivi->etunimi  $rivi->sukunimi <th colspan='2' style='text-align:right'>$rivi->aika 
		<tr><td colspan='3' >$rivi->viesti ";
}
print "</table>";

mysqli_stmt_close($stmt);
mysqli_close($yhteys); 

?>
</div>




</body>
</html>















