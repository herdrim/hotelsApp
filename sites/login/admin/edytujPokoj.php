<?php
require_once('dostepAdmin.php');
require_once('../wyloguj.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

echo "<a class='btn btn-primary' href='pokoje.php'>Powrót</a></br></br>";

$pokoje = $connection -> SelectAll("pokoje where id=$_POST[idPokoju]") -> fetch(PDO::FETCH_ASSOC);

echo '<table class=table border>';
echo '<thead><th>Co chcesz zmienic</th><th>Aktualnie</th><th>Zmiana(jezeli puste to pozostanie bez zmiany)</th></thead>';	
echo '<form method=POST action=zmianaPokoj.php>';
echo "<tr><td>Komfort:</td><td>$pokoje[komfort]</td><td><input name=komfort type=number step=1 max=5 min=1></tr>";
echo "<tr><td>Liczba osob:</td><td>$pokoje[liczbaOsob]</td><td><input name=liczbaOsob type=number step=1 max=6 min=1></tr>";
echo "<tr><td>Liczba lozek:</td><td>$pokoje[lozka]</td><td><input name=lozka type=number step=1 max=6 min=1></tr>";
echo "<tr><td>Hotel(numer):</td><td>$pokoje[idHotelu]</td><td><input name=idHotelu type=number step=1 min=0></tr>";
echo "<tr><td>Cena:</td><td>$pokoje[cena]</td><td><input name=cena type=number step=0.01 min=1></tr>";
echo "<tr><td>Zdjecie:</td><td>$pokoje[zdjecie]</td><td><input name=zdjecie></tr>";

echo '</table>';
echo "<input type=hidden value=$pokoje[id] name=id>";
echo '<input type=submit value=Zmien>';
echo '</form>';	

?>