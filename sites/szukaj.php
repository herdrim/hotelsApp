<?php 
require_once('login/dostep.php');
require_once('login/wyloguj.php');
require_once('../models/dbconnection.php');
include_once('../models/bootstrapLink.php');
?>

<form method=GET action=listapokojow.php>
    <table class=table border>
        <thead>
        	<th>Miasto</th><th>Liczba osób</th><th>Liczba łóżek</th>
        	<th>Komfort</th><th>Cena od</th><th>Cena do</th>
        </thead>
        <tbody><tr>
        	<td>
	        <?php 
	        $connection = new DatabaseConnection('localhost', 'root', '', 'hotele');
	        echo '<select name=miasto>';
	        echo '<option value=%>';
	        foreach(($connection->SelectColumn('hotel', 'miasto')) as $miasto)
	        	echo "<option>" . $miasto['miasto'];
			echo '</select>'; 
			?>
			</td>
            <td><select name=osoby>
                <option value=%>
                <option>1
                <option>2
                <option>3
                <option>4
            </select></td>
            <td><select name=lozka>
               <option value=%>
                <option>1
                <option>2
                <option>3
                <option>4
            </select></td>
                <td><select name=komfort>
                <option value=%>
                <option>1
                <option>2
                <option>3
                <option>4
                <option>5
            </select></td>
            <td><input type=number min=0 step=0.01 name=cenaOd></td>
            <td><input type=number min=0 step=0.01 name=cenaDo></td>
            </tr>
        </tbody>
    </table>
        
        <input class='btn btn-success' value="Wyszukaj" type=submit>    
    
</form>
