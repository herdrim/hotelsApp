<?php
require_once('dostepAdmin.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

if(!isset($_GET['rezerwacja']))
{
	echo 'Bledne dane o rezerwacji';
	exit;
}

$connection -> Connection -> query("delete from rezerwacja where id = $_GET[rezerwacja]");
header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/admin/rezerwacje.php");


?>