<?php
require_once('../../models/dbconnection.php');


// przypisanie POSTów do zmiennych
$login = $_POST['login'];
$haslo = sha1($_POST['haslo']);

// wyszukanie liczby użytkowników o podanym loginie i haśle
$prep = $connection->Connection->prepare('select count(id) from uzytkownik where login = :login and haslo = :haslo');

$prep->bindParam(':login', $login);
$prep->bindParam(':haslo', $haslo);

$wynikCount = $prep->execute();
// przypisanie wyników do tablicy numerowanej
$wynikCount = $prep->fetch(PDO::FETCH_NUM);

// sprawdzenie czy liczba takich użytkowników = 1 (tylko wtedy możliwe zalogowanie)
if($wynikCount[0] == 1)
{
	$prep = $connection->Connection->prepare('select * from uzytkownik where login = :login and haslo = :haslo');

	$prep->bindParam(':login', $login);
	$prep->bindParam(':haslo', $haslo);	
	
	$wynik = $prep->execute();
	$wynik = $prep->fetch(PDO::FETCH_ASSOC);
	
	session_start();
	// zapisanie id, loginu i roli użytkownika do zmiennych sesji
	if(!isset($_SESSION['login']))
		$_SESSION['login'] = $wynik['login'];
	if(!isset($_SESSION['rola']))
		$_SESSION['rola'] = $wynik['rola'];
	if(!isset($_SESSION['id']))
		$_SESSION['id'] = $wynik['id'];	
		
header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/szukaj.php");	
}
else
{
	echo 'Bledne dane logowania';
	exit;
}

?>