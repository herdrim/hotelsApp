<?php
require_once('dostepAdmin.php');
require_once('../wyloguj.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

echo "<a class='btn btn-primary' href='administracja.php'>Powrót</a></br></br>";

$pokoje = $connection -> Connection -> query('select p.id, p.komfort, p.liczbaOsob, p.lozka, p.cena, p.zdjecie, h.miasto from pokoje p inner join hotel h on p.idHotelu = h.id');

echo '<table class=table border><thead><th>Numer</th><th>Miasto</th><th>komfort</th><th>Liczba osob</th><th>Liczba lozek</th><th>Cena</th><th>Zdjecie</th></thead><tbody>';

while(($wynik = $pokoje->fetch(PDO::FETCH_ASSOC)) != null)
{
	echo "<tr><td>$wynik[id]</td><td>$wynik[miasto]</td><td>$wynik[komfort]</td>";
	echo "<td>$wynik[liczbaOsob]</td><td>$wynik[lozka]</td><td>$wynik[cena] zł</td><td>$wynik[zdjecie]</td>";
	echo "<td><form method=POST action=edytujPokoj.php><input type=hidden value=$wynik[id] name=idPokoju><input class='btn btn-info' type=submit value=Edytuj></form></td>";
	echo "<td><form method=POST onsubmit=" . '"return confirm(' . "'Czy na pewno chcesz usunac ten pokoj?'" . ');"' . "action=usunPokoj.php><input type=hidden value=$wynik[id] name=idPokoju><input class='btn btn-danger' type=submit value=Usun></form></td>";	

}
echo '</tbody></table>';


echo "<form method=POST action=dodajPokojForm.php><input class='btn btn-success' type=submit value='Dodaj pokoj'></form>";


?>