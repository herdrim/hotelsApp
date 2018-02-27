<?php
require_once('dostepAdmin.php');
require_once('../../../models/dbconnection.php');

if($_POST['miasto'] != NULL)
	$connection->Connection->query("update hotel set miasto = '$_POST[miasto]' where id = $_POST[id]");
	
if($_POST['ulica'] != NULL)
	$connection->Connection->query("update hotel set ulica = '$_POST[ulica]' where id = $_POST[id]");
	
if($_POST['numerBudynku'] != NULL)
	$connection->Connection->query("update hotel set numer = '$_POST[numerBudynku]' where id = $_POST[id]");
	
	
header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/admin/hotele.php");	

?>