<?php
require_once('dostepAdmin.php');
require_once('../wyloguj.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

echo "<a class='btn btn-primary' href='administracja.php'>Powrót</a></br></br>";

$rezerwacje = $connection -> SelectAll('uzytkownik');
	
echo '<table class=table border><thead><th>Login</th><th>Rola</th></thead><tbody>';

while(($wynik=$rezerwacje->fetch(PDO::FETCH_ASSOC)) != null)
{
	echo "<tr><td>$wynik[login]</td><td>$wynik[rola]</td>";
	
	echo "<td><form method=POST action=rolaUzytkownik.php><input type=hidden value=$wynik[id] name=idUzytkownika>";
	echo '<select name=rola><option value=user>User</option><option value=mod>Moderator</option><option value=admin>Administrator</option></select>';
	echo "<input class='btn btn-info' type=submit value=Zmien></form>";
	
	echo "<td><form method=POST onsubmit=" . '"return confirm(' . "'Czy na pewno chcesz usunac tego użytkownika?'" . ');"' . "action=usunUzytkownika.php><input type=hidden value=$wynik[id] name=idUzytkownika><input class='btn btn-danger' type=submit value=Usun></form></td></tr>";
}
echo '</tbody></table>';

?>
