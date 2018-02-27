<?php
require_once('dostepAdmin.php');
require_once('../wyloguj.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

echo "<a class='btn btn-primary' href='administracja.php'>Powrót</a></br></br>";

$listaHoteli = $connection -> SelectAll('hotel');

echo '<table class=table border><thead><th>Numer hotelu</th><th>Miasto</th><th>Ulica</th><th>Numer budynku</th></thead><tbody>';

while(($wynik = $listaHoteli->fetch(PDO::FETCH_ASSOC)) != null)
{
	echo "<tr><td>$wynik[id]</td><td>$wynik[miasto]</td><td>$wynik[ulica]</td>";
	echo "<td>$wynik[numer]</td>";
	echo "<td><form method=POST action=edytujHotel.php><input type=hidden value=$wynik[id] name=idHotelu><input class='btn btn-info' type=submit value=Edytuj></form></td>";
	echo "<td><form method=POST onsubmit=" . '"return confirm(' . "'Czy na pewno chcesz usunac ten hotel?'" . ');"' . "action=usunHotel.php><input type=hidden value=$wynik[id] name=idHotelu><input class='btn btn-danger' type=submit value=Usun></form></td>";	

}
echo '</tbody></table>';


echo "<form method=POST action=dodajHotelForm.php><input class='btn btn-success' type=submit value='Dodaj hotel'></form>";
?>