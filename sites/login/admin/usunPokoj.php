<?php
require_once('dostepAdmin.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");


$connection -> Connection -> query("delete from pokoje where id = $_POST[idPokoju]");
header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/admin/pokoje.php");


?>