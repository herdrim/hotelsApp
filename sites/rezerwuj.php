<?php
require_once('login/dostep.php');
require_once('login/wyloguj.php');
require_once('../models/dbconnection.php');
include_once('../models/bootstrapLink.php');

$pokoj = $connection -> Connection -> query("select count(id) from pokoje where id = $_POST[nrPokoju]") -> fetch(PDO::FETCH_NUM);
if($pokoj[0] <= 0)
{
	echo "Wyst¹pi³ b³¹d. Proszê spróbowaæ ponownie zarezerwowaæ dany pokój.";
	exit;
}

$dataOd = $_POST['dataOd'];
$dataDo = $_POST['dataDo'];
if($dataOd >= $dataDo || $dataOd < date("Y-m-d"))
{	
	echo "Podane daty s¹ b³êdne";
	exit;
}


$prep = $connection -> Connection -> prepare("insert into rezerwacja (idPokoju, idUzytkownika, dataPoczatek, dataKoniec) values(:pokoj, :uzytkownik, :poczatek, :koniec)");
$prep->bindParam(':pokoj', $_POST['nrPokoju']);
$prep->bindParam(':uzytkownik', $_SESSION['id']);
$prep->bindParam(':poczatek', $dataOd);
$prep->bindParam(':koniec', $dataDo);

$prep->execute();


?>

Rezerwacja ukoñczona. Aby j¹ obejrzeæ przejdŸ do <a href=login/profile.php?rezerwacje=true>moje rezerwacje</a>
