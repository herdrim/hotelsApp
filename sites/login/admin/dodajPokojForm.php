<?php
require_once('dostepAdmin.php');
require_once('../wyloguj.php');
include_once("../../../models/bootstrapLink.php");

echo "<a class='btn btn-primary' href='pokoje.php'>Powrót</a></br></br>";

echo '<table class=table border>';	
echo '<form method=POST action=dodajPokoj.php>';
echo "<tr><td>Komfort:</td><td><input name=komfort type=number step=1 max=5 min=1></tr>";
echo "<tr><td>Liczba osob:</td><td><input name=liczbaOsob type=number step=1 max=6 min=1></tr>";
echo "<tr><td>Liczba lozek:</td><td><input name=lozka type=number step=1 max=6 min=1></tr>";
echo "<tr><td>Hotel(numer):</td><td><input name=idHotelu type=number step=1 min=0></tr>";
echo "<tr><td>Cena:</td><td><input name=cena type=number step=0.01 min=1></tr>";
echo "<tr><td>Zdjecie:</td><td><input name=zdjecie></tr>";

echo '</table>';
echo '<input type=submit value=Dodaj>';
echo '</form>';	

?>