<link rel="Stylesheet" type="text/css" href="../../styles/ErrorStyle.css" rel="text"/>
<?php 
	include_once("../../models/bootstrapLink.php");
?>
<script>
function validateForm()
{
	var login = document.forms["loginForm"]["login"].value;
	var pass = document.forms["loginForm"]["haslo"].value;
	if(login == "" || pass == "")
	{
		var txt = document.getElementById("errors");
		txt.setAttribute("class", "error");
		txt.innerHTML = "Musisz podać login i haslo";
        return false;
	}		
}
</script>

<?php
if(isset($_GET['reg']))
{
	if($_GET['reg'] == TRUE)
		echo 'Zostales zarejestrowany! Zaloguj sie aby kontynuowac.';	
}
echo '<div id=errors></div>';



// FORMULARZ LOGOWANIA
session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['rola']))
{
	echo "<form name=loginForm method=POST onsubmit='return validateForm()' action=loginWynik.php>";
	echo 'Login: <input name=login></br>';
	echo 'Haslo: <input type=password name=haslo></br>';
	echo "<input class='btn btn-success' type=submit value=Zaloguj>";
	echo '</form></br>';
	echo "Nie masz jeszcze konta? <a class='btn btn-info' href=registrationForm.php>Zarejestruj sie!</a>";	
}
else
{
	echo 'Wystapil blad. Jestes juz zalogowany jako ' . $_SESSION['login'] . '!</br>';
	echo '<a href=../szukaj.php>Szukaj</a></br>';
	exit();
}

?>
