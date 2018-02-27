<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/loginForm.php");
	}

?>