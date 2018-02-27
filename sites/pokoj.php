<?php
require_once('login/dostep.php');
require_once('login/wyloguj.php');
require_once('../models/dbconnection.php');
include_once('../models/bootstrapLink.php');

echo '<a class="btn btn-primary" href=szukaj.php>Wyszukiwarka</a></br></br>';

if(!isset($_GET['nrPokoju']))
{
	echo 'Brak danych na temat pokoju';
	exit;
}

$nr = $_GET['nrPokoju'];
$connection = new DatabaseConnection('localhost', 'root', '', 'hotele');

$pokoj = $connection -> Connection -> query("select * from pokoje p inner join hotel h on p.idHotelu = h.id where p.id = $nr") -> fetch(PDO::FETCH_ASSOC);

echo "Lokalizacja hotelu: $pokoj[miasto] $pokoj[ulica] $pokoj[numer] </br>";
echo 'Komfort: ' . $pokoj['komfort'] . '</br>';
echo 'Liczba osób: ' . $pokoj['liczbaOsob'] . '</br>';
echo 'Łóżka: ' . $pokoj['lozka'] . '</br>';
echo 'Cena: ' . $pokoj['cena'] . ' zł</br>';


// formularz sprawdzenia dostępności
echo '</br>Sprawdź dostępność</br>';
echo "<form method=POST action=terminy.php>";
echo "<input type=hidden name=nrPokoju value=$nr>";
echo "<input type=date name=dataOd>";
echo "<input type=date name=dataDo>";
echo "<input class='btn btn-success' type=submit value='Sprawdź dostępność'>";

?>

