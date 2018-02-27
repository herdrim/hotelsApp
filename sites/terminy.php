<?php
require_once('login/dostep.php');
require_once('login/wyloguj.php');
require_once('../models/dbconnection.php');
include_once('../models/bootstrapLink.php');

if(!isset($_POST['nrPokoju']))
{
	echo 'Brak danych na temat pokoju';
	exit;
}
elseif(!isset($_POST['dataOd']) || !isset($_POST['dataDo']))
{
	exit;
}

$nr = $_POST['nrPokoju'];
$dataOd = $_POST['dataOd'];
$dataDo = $_POST['dataDo'];

$terminy = $connection -> Connection -> query("select count(id), dataKoniec from rezerwacja where idPokoju = $nr AND (('$dataDo' < dataKoniec AND '$dataDo' > dataPoczatek) OR ('$dataOd' > dataPoczatek AND '$dataOd' < dataKoniec) OR ('$dataOd' <= dataPoczatek AND '$dataDo' >= dataKoniec))") -> fetch(PDO::FETCH_NUM);

echo "<a class='btn btn-primary' href=pokoj.php?nrPokoju=$nr>Powrót</a></br>";

if($dataOd >= $dataDo || $dataOd < date("Y-m-d"))
{	
	echo "Podane daty są błędne";
	exit;
}
	
if($terminy[0] > 0)
{
	echo '</br>Pokój jest zajęty w tym terminie';
	exit;	
}

echo '</br>Można zarezerwować pokój</br>';



echo "<form method=POST action=rezerwuj.php>";
echo "<input type=hidden name=nrPokoju value=$nr>";
echo "<input type=hidden name=dataOd value=$dataOd>";
echo "<input type=hidden name=dataDo value=$dataDo>";
echo "<input class='btn btn-success' type=submit value=Zarezerwuj>";


?>