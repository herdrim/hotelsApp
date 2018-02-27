<?php
require_once('dostepAdmin.php');
require_once('../../../models/dbconnection.php');
include_once("../../../models/bootstrapLink.php");

if(isset($_POST['miasto']) && isset($_POST['ulica']) && isset($_POST['numer']))
{
	if($_POST['miasto'] != null && $_POST['ulica'] != null && $_POST['numer'] != null)
	{		
		$connection -> Connection -> query("insert into hotel(miasto,ulica,numer) values('$_POST[miasto]','$_POST[ulica]','$_POST[numer]')");
	}
	header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/admin/hotele.php");
}


?>