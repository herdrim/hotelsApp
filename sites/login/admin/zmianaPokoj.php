<?php
require_once('dostepAdmin.php');
require_once('../../../models/dbconnection.php');

if($_POST['komfort'] != NULL)
	$connection->Connection->query("update pokoje set komfort = '$_POST[komfort]' where id = $_POST[id]");
	
if($_POST['liczbaOsob'] != NULL)
	$connection->Connection->query("update pokoje set liczbaOsob = '$_POST[liczbaOsob]' where id = $_POST[id]");
	
if($_POST['lozka'] != NULL)
	$connection->Connection->query("update pokoje set lozka = '$_POST[lozka]' where id = $_POST[id]");
	
if($_POST['idHotelu'] != NULL)
	$connection->Connection->query("update pokoje set idHotelu = '$_POST[idHotelu]' where id = $_POST[id]");
	
if($_POST['cena'] != NULL)
	$connection->Connection->query("update pokoje set cena = '$_POST[cena]' where id = $_POST[id]");
	
if($_POST['zdjecie'] != NULL)
	$connection->Connection->query("update pokoje set zdjecie = '$_POST[zdjecie]' where id = $_POST[id]");
	
	
header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/admin/pokoje.php");	

?>