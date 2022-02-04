<?php

if (isset($_GET["muokattava"])){ 	
	$muokattava=$_GET["muokattava"];
}

//// MUODOSTA YHTEYS////

$yhteys=mysqli_connect("localhost", "trtkm20b3", "trtkm20b3");

//tarkista yhteys

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

//valitaan tietokannasta kaikki tieto


$sql="select * from katjan_vieraskirja where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'i', $muokattava);
mysqli_stmt_execute($stmt);

$tulos=mysqli_stmt_get_result($stmt);

if ($rivi=mysqli_fetch_object($tulos)){	
	//php koodi suljetaan
?> 


      <form action='PaivitaTietokanta.php' method='post'>

	<input type='hidden' name='id' value='<?php print $rivi->id;?>'><br>

        <label for='etunimi'>Etunimi</label>
			<input type='text' name='etunimi' placeholder='Etunimi' required value='<?php print $rivi->etunimi;?>'>

        <label for='sukunimi'>Sukunimi</label>
			<input type='text' name='sukunimi' placeholder='Sukunimi' required value='<?php print $rivi->sukunimi;?>'>

        <label for='viesti'>Viesti</label>
			<textarea maxlength="150" name='viesti' value='<?php print $rivi->viesti;?>'><?php print $rivi->viesti;?></textarea>

              	<input type='hidden' name='aika' value='<?php print $rivi->aika;?>'><br>

	 <input type='submit' value='MUOKKAA'>
      </form>

<?php

//
$tulos=mysqli_query($yhteys, "select * from katjan_vieraskirja");

//// TULOSTETAAN VIERASKIRJA LOMAKKEEN ALLE

print "<table border='1'>";
print "<tr> <td>Etunimi <td>Sukunimi <td> Viesti <td>Viesti on jätetty:";

while ($rivi=mysqli_fetch_object($tulos)){
	print "<tr><td>$rivi->etunimi <td>$rivi->sukunimi <td>$rivi->viesti <td>($rivi->aika)";
 //       print "<td><a href='poistaTietokannasta.php?poistettava=$rivi->id'>Poista</a>";
//	print "<td><a href='muokkaaTietokantaa2.php?muokattavaa=$rivi->id'>Muokkaa</a>";		
}

print "</table>";
}

?>

<script>
function tilaaUutiskirje() {
  document.getElementById("uutiskirje").style.display = "block";
}

function suljeLomake() {
  document.getElementById("uutiskirje").style.display = "none";
}
</script>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>






