<?php 
require_once('dostep.php');
require_once('wyloguj.php');
require_once('../../models/dbconnection.php');
include_once("../../models/bootstrapLink.php");
?>

<a class="btn btn-success" href="../szukaj.php">Szukaj</a></br></br>
<table>
<tr>
	<td><a class="btn btn-primary" href=profile.php?rezerwacje=true>Moje rezerwacje</a></td>
	<td><a class="btn btn-primary" href=profile.php?historia=true>Historia rezerwacji</a></td>
	<td><a class="btn btn-primary" href=profile.php?edycja=true>Mój profil</a></td>
</tr>
</table></br>

<?php 
if($_SESSION['rola'] == 'admin' || $_SESSION['rola'] == 'mod')
	echo '<a class="btn btn-success" href=admin/administracja.php>Panel administracyjny</a>';


if(isset($_GET['haslo']))
	echo '<font color=red>Podane haslo jest za krotkie(musi miec przynajmniej 6 znakow).</font>';

if(isset($_GET['stareHaslo']))
	echo '<font color=red>Poprzednie haslo jest bledne.</font>';


// zakładka moje rezerwacje
if(isset($_GET['rezerwacje']))
{
echo '<h2>Moje rezerwacje</h2>';
$biezacaData = date("Y-m-d");
$rezerwacje = $connection -> Connection -> query("select r.id, r.idPokoju, r.dataPoczatek, r.dataKoniec, p.komfort, p.liczbaOsob, p.lozka, p.cena, h.miasto  from rezerwacja r inner join pokoje p on r.idPokoju = p.id inner join hotel h on p.idHotelu = h.id where r.idUzytkownika = $_SESSION[id] AND r.dataKoniec > '$biezacaData'");
	
echo '<table class=table border><thead><th>Miasto</th><th>Numer pokoju</th><th>Liczba osób</th><th>Liczba łóżek</th><th>Komfort</th><th>Cena</th><th>Data zameldowania</th><th>Data wymeldowania</th></thead><tbody>';

while(($wynik=$rezerwacje->fetch(PDO::FETCH_ASSOC)) != null)
{
	echo "<tr><td>$wynik[miasto]</td><td>$wynik[idPokoju]</td><td>$wynik[liczbaOsob]</td><td>$wynik[lozka]</td><td>$wynik[komfort]</td>";
	echo "<td>$wynik[cena]</td><td>$wynik[dataPoczatek]</td><td>$wynik[dataKoniec]</td>";
	echo "<td><a class='btn btn-info' href=rezerwacjaPdf.php?rezerwacja=$wynik[id]>Generuj pdf</a></td>";
	echo "<td><a class='btn btn-danger' href=anulujRezerwacje.php?rezerwacja=$wynik[id] onclick=" . '"return confirm(' . "'Czy na pewno chcesz anulować rezerwacje?'" . ');"' . '>Anuluj rezerwacje</td></tr>';
}
echo '</tbody></table>';

}

// zakładka moj profil
elseif(isset($_GET['edycja']))
{
	echo '<h2>Moj profil</h2>';
	
	$prep = $connection->Connection->prepare('select * from uzytkownik where login = :login and id = :id');

	$prep->bindParam(':login', $_SESSION['login']);
	$prep->bindParam(':id', $_SESSION['id']);	
	
	$wynik = $prep->execute();
	$wynik = $prep->fetch(PDO::FETCH_ASSOC);
	
	echo '<table class=table border>';
	echo '<thead><th>Co chcesz zmienic</th><th>Aktualnie</th><th>Zmiana(jezeli puste to pozostanie bez zmiany)</th></thead>';	
	echo '<form method=POST action=zmiana.php>';
	echo "<tr><td>Podaj imie do zmiany:</td><td>$wynik[imie]</td><td><input name=imie></tr>";
	echo "<tr><td>Podaj nazwisko do zmiany:</td><td>$wynik[nazwisko]</td><td><input name=nazwisko></tr>";
	echo "<tr><td>Podaj numer dowodu do zmiany:</td><td>$wynik[nrDowodu]</td><td><input name=dowod></tr>";
	echo '<tr><td>Aby zmienic haslo podaj najpierw dotychczasowe:</td><td></td><td><input type=password name=stareHaslo></tr>';
	echo '<tr><td>Podaj nowe haslo:</td><td></td><td><input type=password name=haslo></tr>';
	echo '</table>';
	echo "<input type=hidden value=$wynik[id] name=id>";
	echo "<input class='btn btn-success' type=submit value=Zmien>";
	echo '</form>';	
}


// zakladka historia rezerwacji
if(isset($_GET['historia']))
{
echo '<h2>Historia rezerwacji</h2>';
$biezacaData = date("Y-m-d");
$rezerwacje = $connection -> Connection -> query("select r.id, r.idPokoju, r.dataPoczatek, r.dataKoniec, p.komfort, p.liczbaOsob, p.lozka, p.cena, h.miasto  from rezerwacja r inner join pokoje p on r.idPokoju = p.id inner join hotel h on p.idHotelu = h.id where r.idUzytkownika = $_SESSION[id] AND r.dataKoniec < '$biezacaData'");
	
echo '<table class=table border><thead><th>Miasto</th><th>Numer pokoju</th><th>Liczba osób</th><th>Liczba łóżek</th><th>Komfort</th><th>Cena</th><th>Data zameldowania</th><th>Data wymeldowania</th></thead><tbody>';

while(($wynik=$rezerwacje->fetch(PDO::FETCH_ASSOC)) != null)
{
	echo "<tr><td>$wynik[miasto]</td><td>$wynik[idPokoju]</td><td>$wynik[liczbaOsob]</td><td>$wynik[lozka]</td><td>$wynik[komfort]</td>";
	echo "<td>$wynik[cena]</td><td>$wynik[dataPoczatek]</td><td>$wynik[dataKoniec]</td>";
	echo '</tr>';
}
echo '</tbody></table>';

}


?>