<?php
require_once('../../models/dbconnection.php');
	

// sprawdzanie czy wszystkie dane zostaly podane
$isFailed = 'FALSE';
$loginName = 'FALSE';
$loginLenght = 'FALSE';
$passwordLenght = 'FALSE';
	
if($_POST['login'] == NULL || $_POST['haslo'] == NULL || $_POST['imie'] == NULL || $_POST['nazwisko'] == NULL || $_POST['dataUrodzenia'] == NULL || $_POST['dowod'] == NULL)
	$isFailed = 'TRUE';

// czy login nie jest zajety i czy nie za krotki
$prep = $connection->Connection->prepare("select count(id) from uzytkownik where login = '$_POST[login]'");
$czyIstnieje = $prep->execute();
$czyIstnieje = $prep->fetch(PDO::FETCH_NUM);
if($czyIstnieje[0] > 0)
{
	$loginName = 'TRUE';
}
elseif(strlen($_POST['login']) < 2)
	$loginLenght = 'TRUE';

// czy haslo nie jest za krotkie
if(strlen($_POST['haslo']) < 6 )
	$passwordLenght = 'TRUE';
	


// wyslanie informacji o bledach getem	
if($isFailed == 'TRUE' || $loginLenght == 'TRUE' || $passwordLenght == 'TRUE')
	{
		header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/registrationForm.php?loginName=$loginName&isFailed=$isFailed&login=$loginLenght&haslo=$passwordLenght");
		exit;
	}
	

	


$prep = $connection -> Connection -> prepare('insert into uzytkownik (login, haslo, rola, imie, nazwisko, dataUrodzenia, nrDowodu) values(:login, :haslo, :rola, :imie, :nazwisko, :data, :dowod)');

$prep->bindParam(':login', $_POST['login']);
$haslo = sha1($_POST['haslo']);
$prep->bindParam(':haslo', $haslo);
$rola = 'user';
$prep->bindParam(':rola', $rola);
$prep->bindParam(':imie', $_POST['imie']);
$prep->bindParam(':nazwisko', $_POST['nazwisko']);
$prep->bindParam(':data', $_POST['dataUrodzenia']);
$prep->bindParam(':dowod', $_POST['dowod']);
$prep->execute();

header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/loginForm.php?reg=TRUE");				


	
?>