<?php
require_once('dostepAdmin.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

$connection -> Connection -> query("delete from uzytkownik where id = $_POST[idUzytkownika]");
header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/admin/uzytkownicy.php");


?>