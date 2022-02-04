<?php

if (isset($_GET["poistettava"])){
	$poistettava=$_GET["poistettava"];
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
echo "Tietokanta OK.<br>";

//// TIETOKANNASTA POISTAMINEN ////

if(isset($poistettava)){ 
	$sql="delete from katjan_vieraskirja where id=?";
	$stmt=mysqli_prepare($yhteys, $sql);
	mysqli_stmt_bind_param($stmt, 'i', $poistettava);
	mysqli_stmt_execute($stmt);
}

header("Location:LueTietokannasta.php");
exit; 	


mysqli_close($yhteys); 	

	



?>
