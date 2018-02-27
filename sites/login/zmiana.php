<?php 
require_once('dostep.php');
require_once('wyloguj.php');
require_once('../../models/dbconnection.php');
include_once("../../models/bootstrapLink.php");


if($_POST['imie'] != NULL)
	$connection->Connection->query("update uzytkownik set imie = '$_POST[imie]' where id = $_POST[id]");

if($_POST['nazwisko'] != NULL)
	$connection->Connection->query("update uzytkownik set nazwisko = '$_POST[nazwisko]' where id = $_POST[id]");

if($_POST['dowod'] != NULL)
	$connection->Connection->query("update uzytkownik set nrDowodu = '$_POST[dowod]' where id = $_POST[id]");

if($_POST['stareHaslo'] != NULL && $_POST['haslo'] != NULL)
{
	// sprawdzenie czy nowe haslo ma przynajmniej 6 znakow
	if(strlen($_POST['haslo']) < 6)
	{
		header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/profile.php?edycja=TRUE&haslo=TRUE");
		exit;
	}		
	
	// sprawdza czy stare haslo pasuje do uzytkownika
	$prep = $connection->Connection->prepare("select count(id) from uzytkownik where haslo = :haslo and login = :login");
	$prep->bindParam(':haslo', $_POST['stareHaslo']);
	$prep->bindParam(':login', $_SESSION['login']);
	$prep->execute();
	$wynik = $prep->fetch(PDO::FETCH_NUM);
	
	// jezeli tak to robi update, jezeli nie to przenosi do formularza zmiany
	if($wynik[0] == 1)	
		$connection->Connection->query("update uzytkownik set haslo = '$_POST[haslo]' where id = $_POST[id]");
	else
	{
		header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/profile.php?edycja=TRUE&stareHaslo=TRUE");
		exit;
	}		
}
header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/profile.php?edycja=TRUE");

?>