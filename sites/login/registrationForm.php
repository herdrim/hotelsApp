<link rel="Stylesheet" type="text/css" href="../../styles/ErrorStyle.css" rel="text"/>
<?php 
include_once("../../models/bootstrapLink.php");
?>


<?php 
	if(isset($_GET['loginName']) && isset($_GET['isFailed']) && isset($_GET['login']) && isset($_GET['haslo']))
	{
		echo '<ul class=error>';
		if($_GET['isFailed'] == 'TRUE')
			echo '<li>Musisz podać wszystkie dane!</li>';
		if($_GET['loginName'] == 'TRUE')
			echo '<li>Ten login jest juz zajety</li>';
		if($_GET['login'] == 'TRUE')
			echo '<li>Twoj login jest za krotki(musi byc dluzszy niz 2 znaki).</li>';
		if($_GET['haslo'] == 'TRUE')
			echo '<li>Twoje haslo jest za krotkie(musi byc dluzsze niz 6 znakow).</li>';
		echo '</ul>';
	}		
?>


<form name="registrationForm" method=POST action='registration.php'>
	Login: <input name='login'></br>
	Haslo: <input type="password" name='haslo'></br>
	Imie: <input name='imie'></br>
	Nazwisko: <input name='nazwisko'></br>
	Data urodzenia: <input type="date" name='dataUrodzenia'></br>
	Numer dowodu: <input name='dowod'></br>	
	<input class='btn btn-success' type="submit" value="Zarejestruj">
</form></br></br>
<a class='btn btn-info' href="loginForm.php">Powrot to logowania</a>
