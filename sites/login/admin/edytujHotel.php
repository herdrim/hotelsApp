<?php
require_once('dostepAdmin.php');
require_once('../wyloguj.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

echo "<a class='btn btn-primary' href='hotele.php'>Powrót</a></br></br>";

$hotele = $connection -> SelectAll("hotel where id=$_POST[idHotelu]") -> fetch(PDO::FETCH_ASSOC);

echo '<table class=table border>';
echo '<thead><th>Co chcesz zmienic</th><th>Aktualnie</th><th>Zmiana(jezeli puste to pozostanie bez zmiany)</th></thead>';	
echo '<form method=POST action=zmianaHotel.php>';
echo "<tr><td>Miasto:</td><td>$hotele[miasto]</td><td><input name=miasto></tr>";
echo "<tr><td>Ulica</td><td>$hotele[ulica]</td><td><input name=ulica></tr>";
echo "<tr><td>Numer budynku</td><td>$hotele[numer]</td><td><input name=numerBudynku></tr>";

echo '</table>';
echo "<input type=hidden value=$hotele[id] name=id>";
echo '<input type=submit value=Zmien>';
echo '</form>';

?>