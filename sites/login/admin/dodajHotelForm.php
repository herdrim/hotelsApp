<?php
require_once('dostepAdmin.php');
require_once('../wyloguj.php');
include_once("../../../models/bootstrapLink.php");

echo "<a class='btn btn-primary' href='hotele.php'>Powrót</a></br></br>";

echo '<table class=table border>';	
echo '<form method=POST action=dodajHotel.php>';
echo "<tr><td>Miasto:</td><td><input name=miasto></tr>";
echo "<tr><td>Ulica</td><td><input name=ulica></tr>";
echo "<tr><td>Numer budynku</td><td><input name=numer></tr>";

echo '</table>';
echo '<input type=submit value=Dodaj>';
echo '</form>';	

?>