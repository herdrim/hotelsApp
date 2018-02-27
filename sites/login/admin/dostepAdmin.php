<?php
	session_start();
	if(isset($_SESSION['login']))
	{
		if($_SESSION['rola'] != 'admin' && $_SESSION['rola'] != 'mod')
		{
			header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/profile.php");
			exit;
		}
	}
	if(!isset($_SESSION['login']))
	{
		header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/loginForm.php");
		exit;
	}


?>