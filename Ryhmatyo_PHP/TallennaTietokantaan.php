<?php

//// TALLETETAAN index.html VIERASKIRJAAN TULEVAT TIEDOT TIETOKANTAAN ////

if (isset($_POST["etunimi"])){
	$etunimi=$_POST["etunimi"];
}
else{
	$etunimi="";
}


if (isset($_POST["sukunimi"])){
	$sukunimi=$_POST["sukunimi"];
}
else{
	$sukunimi="";
}

if (isset($_POST["viesti"])){
	$viesti=$_POST["viesti"];
}
else{
	$viesti="";
}

//// MUODOSTA YHTEYS////

$yhteys=mysqli_connect("localhost", "trtkm20b3", "trtkm20b3");
if (!$yhteys){
	header("Location:Virheilmoitus.html");
	exit;
}

//// TIETOKANNAN VALINTA////

$tietokanta=mysqli_select_db($yhteys, "trtkm20b3");
if (!$tietokanta) {
	header("Location:Virheilmoitus.html");
	exit;
}
echo "Tietokanta OK.";

////TIETOKANTAAN KIRJOITTAMINEN////




	$sql="insert into katjan_vieraskirja(etunimi, sukunimi, viesti, aika) values(?, ?, ?, ?)";

	$stmt=mysqli_prepare($yhteys, $sql);
	mysqli_stmt_bind_param($stmt, 'ssss', $etunimi, $sukunimi, $viesti, date("Y-m-d h:i:s"));
	mysqli_stmt_execute($stmt);


////YHTEYDEN KATKAISU////

	mysqli_stmt_close($stmt);
	mysqli_close($yhteys); 	

header("Location:index.php");
exit; 		

?>
