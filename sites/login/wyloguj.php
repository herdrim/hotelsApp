<style>
.wyloguj{
	width: inherit; text-align: right;
}
</style>

<?php

if(isset($_SESSION['login']))
{
	echo '<div class=wyloguj>';
	echo "<form method=POST>";
	echo '<input type=hidden value=on name=wyloguj>';
	echo "Zalogowany: <a href=http://$_SERVER[SERVER_NAME]/hotel/sites/login/profile.php>$_SESSION[login]</a></br><input type=submit value=Wyloguj>";
	echo '</form>';	
	echo '</div>';
}

// sprawdzenie czy do ukrytego inputa o nazwie wyloguj zosta�y przes�ane jakie� dane
if(isset($_POST['wyloguj']))
{
	// je�li tak to u�ytkownik zostaje wylogowany poprzez usuni�cie danych sesji
	if(isset($_SESSION['login']))
	{
		unset($_SESSION['login']);
		unset($_SESSION['rola']);
		session_destroy();
	}
	// przekierowanie do strony logowania
	header("Location: http://$_SERVER[SERVER_NAME]/hotel/sites/login/loginForm.php");
}



?>