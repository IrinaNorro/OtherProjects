<?php

if (isset($_POST["etunimi"])){ 
	$etunimi=$_POST["etunimi"];
}


if (isset($_POST["sukunimi"])){ 
	$sukunimi=$_POST["sukunimi"];
}


if (isset($_POST["viesti"])){ 
	$viesti=$_POST["viesti"];
}


if (isset($_POST["id"])){ 
	$id=$_POST["id"];
}

if (!(isset($etunimi) || isset($sukunimi) || isset($viesti) || isset($id)) ){
	header("Location:PoistaTietokannasta.php");
	exit;
 }

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

	$sql="update katjan_vieraskirja set etunimi=?, sukunimi=?, viesti=?, aika=? where id=?";
	$stmt=mysqli_prepare($yhteys, $sql);
	mysqli_stmt_bind_param($stmt, 'ssssi', $etunimi, $sukunimi, $viesti, date("Y-m-d h:i:s"), $id);
	mysqli_stmt_execute($stmt);


////YHTEYDEN KATKAISU////

	mysqli_stmt_close($stmt);
	mysqli_close($yhteys); 	

header("Location:LueTietokannasta.php");
exit; 		

?>