<?php
require_once('dostepAdmin.php');
require_once('../wyloguj.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

echo "<a class='btn btn-primary' href='administracja.php'>Powrót</a></br></br>";

$rezerwacje = $connection -> Connection -> query("select r.id, r.idPokoju, h.miasto, u.login from rezerwacja r left join pokoje p on r.idPokoju = p.id left join hotel h on p.idHotelu = h.id left join uzytkownik u on u.id = r.idUzytkownika");
	
echo '<table class=table border><thead><th>Login</th><th>Miasto</th><th>Numer pokoju</th></thead><tbody>';

while(($wynik=$rezerwacje->fetch(PDO::FETCH_ASSOC)) != null)
{
	echo "<tr><td>$wynik[login]</td><td>$wynik[miasto]</td><td>$wynik[idPokoju]</td>";
	echo "<td><a class='btn btn-danger' href=usunRezerwacje.php?rezerwacja=$wynik[id] onclick=" . '"return confirm(' . "'Czy na pewno chcesz usunac rezerwacje?'" . ');"' . '>Usun</td></tr>';
}
echo '</tbody></table>';
?>