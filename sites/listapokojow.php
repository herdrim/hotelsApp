<?php
require_once('login/dostep.php');
require_once('login/wyloguj.php');
require_once('../models/dbconnection.php');
include_once('../models/bootstrapLink.php');

echo '<a class="btn btn-primary" href=szukaj.php>Wyszukiwarka</a></br></br>';

// przypisanie wartości z GET do zmiennych
$miasto = $_GET['miasto'];
// sprawdzenie czy miasto zostało podane
if($miasto != '%')
{
	// przypisanie do zmiennej miasto indeksu hotelu w danym mieście
	$idMiasta = $connection->Connection->query("select * from hotel where miasto = '$miasto'")->fetch(PDO::FETCH_ASSOC);
	
	$miasto = $idMiasta['id'];
}
$liczbaOsob = $_GET['osoby'];
$lozka = $_GET['lozka'];
$komfort = $_GET['komfort'];


// sprawdzanie przedziału cenowego
$cenaOd = $_GET['cenaOd'];
if($cenaOd == null)
    $cenaOd = 0;

$cenaDo = $_GET['cenaDo'];
if($cenaDo == null)
    $cenaDo = 10000;
elseif($cenaDo < $cenaOd)
{
    echo 'Ceny są błędne, podaj inne';
    exit;
}
// wyszukanie pokoi
$prep = $connection->Connection->prepare('select * from pokoje where idHotelu like :idHotelu and liczbaOsob like :osoby and lozka like :lozka and komfort like :komfort and cena >= :cenaod and cena < :cenado');

// bindowanie kryteriów
$prep->bindParam(':idHotelu', $miasto);
$prep->bindParam(':osoby', $liczbaOsob);
$prep->bindParam(':lozka', $lozka);
$prep->bindParam(':komfort', $komfort);
// bindowanie cen
$prep->bindParam(':cenaod', $cenaOd);
$prep->bindParam(':cenado', $cenaDo);

$wynik = $prep->execute();

// wyświetlenie pokoi w tabeli
echo '<table class=table border><thead><th>Liczba osób</th><th>Liczba łóżek</th><th>Komfort(1 - 5)</th><th>Cena</th><th>Zdjęcie</th></thead>';
while(($wynik=$prep->fetch(PDO::FETCH_ASSOC)) != null)
{
    echo '<tr>';
    echo '<td>' . $wynik['liczbaOsob'];
    echo '<td>' . $wynik['lozka'];
    echo '<td>' . $wynik['komfort'];
    echo '<td>' . $wynik['cena'];
    echo '<td>' . $wynik['zdjecie'];
    echo "<td><a class='btn btn-info' href=pokoj.php?nrPokoju=$wynik[id]>Wyświetl";
    echo '</tr>';
}
echo '</table>';











?>