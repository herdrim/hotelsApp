<?php
error_reporting(E_ERROR);

require_once('../../models/dbconnection.php');
require_once("../../fpdf/fpdf.php");
session_start();

if(!isset($_GET['rezerwacja']))
{
	echo 'Blad';
	exit;
}

$rezerwacje = $connection -> Connection -> query("select r.id, r.idPokoju, r.dataPoczatek, r.dataKoniec, p.komfort, p.liczbaOsob, p.lozka, p.cena, h.miasto, u.id, u.imie, u.nazwisko  from rezerwacja r inner join pokoje p on r.idPokoju = p.id inner join hotel h on p.idHotelu = h.id inner join uzytkownik u on u.id = r.idUzytkownika where r.idUzytkownika = $_SESSION[id] AND r.id = $_GET[rezerwacja]");

$wynik=$rezerwacje->fetch(PDO::FETCH_ASSOC);

$pdf = new FPDF();

$pdf -> AddPage();
$pdf -> SetFont('Arial');


$pdf -> Cell(100,10, 'Dane klienta', 0, 1, 'C');
$pdf -> Cell(100,10, "Imie: $wynik[imie]", 0, 1, 'L');
$pdf -> Cell(100,10, "Nazwisko: $wynik[nazwisko]", 0, 1, 'L');
$pdf -> Cell(100,10, 'Dane pokoju', 0, 1, 'C');
$pdf -> Cell(100,10, "Miasto: $wynik[miasto]", 0, 1, 'L');
$pdf -> Cell(100,10, "Data zameldowania: $wynik[dataPoczatek]", 0, 1, 'L');
$pdf -> Cell(100,10, "Data wymeldowania: $wynik[dataKoniec]", 0, 1, 'L');
$pdf -> Cell(100,10, "Liczba osob: $wynik[liczbaOsob]", 0, 1, 'L');
$pdf -> Cell(100,10, "Liczba Lozek: $wynik[lozka]", 0, 1, 'L');
$pdf -> Cell(100,10, "Komfort: $wynik[komfort]", 0, 1, 'L');
$pdf -> Cell(100,10, "Cena: $wynik[cena]zl", 0, 1, 'L');

$pdf -> Output();

?>