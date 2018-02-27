<?php
require_once('dostepAdmin.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

if(isset($_POST['komfort']) && isset($_POST['liczbaOsob']) && isset($_POST['lozka']) && isset($_POST['idHotelu']) && isset($_POST['cena']))
{
	if($_POST['komfort'] != null && $_POST['liczbaOsob'] != null && $_POST['lozka'] != null && $_POST['idHotelu'] != null && $_POST['cena'] != null)
	{
		$zdj = null;
		if($_POST['zdjecie'] != null)
			$zdj = $_POST['zdjecie'];
		$connection -> Connection -> query("insert into pokoje(komfort,liczbaOsob,lozka,idHotelu,cena,zdjecie) values('$_POST[komfort]','$_POST[liczbaOsob]','$_POST[lozka]','$_POST[idHotelu]','$_POST[cena]','$zdj')");
	}
	header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/admin/pokoje.php");
}

	
?>