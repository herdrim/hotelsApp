<?php
require_once('login/dostep.php');
require_once('login/wyloguj.php');
require_once('../models/dbconnection.php');
include_once('../models/bootstrapLink.php');

$pokoj = $connection -> Connection -> query("select count(id) from pokoje where id = $_POST[nrPokoju]") -> fetch(PDO::FETCH_NUM);
if($pokoj[0] <= 0)
{
	echo "Wyst�pi� b��d. Prosz� spr�bowa� ponownie zarezerwowa� dany pok�j.";
	exit;
}

$dataOd = $_POST['dataOd'];
$dataDo = $_POST['dataDo'];
if($dataOd >= $dataDo || $dataOd < date("Y-m-d"))
{	
	echo "Podane daty s� b��dne";
	exit;
}


$prep = $connection -> Connection -> prepare("insert into rezerwacja (idPokoju, idUzytkownika, dataPoczatek, dataKoniec) values(:pokoj, :uzytkownik, :poczatek, :koniec)");
$prep->bindParam(':pokoj', $_POST['nrPokoju']);
$prep->bindParam(':uzytkownik', $_SESSION['id']);
$prep->bindParam(':poczatek', $dataOd);
$prep->bindParam(':koniec', $dataDo);

$prep->execute();


?>

Rezerwacja uko�czona. Aby j� obejrze� przejd� do <a href=login/profile.php?rezerwacje=true>moje rezerwacje</a>
