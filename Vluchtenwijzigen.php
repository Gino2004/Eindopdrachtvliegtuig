<!DOCTYPE html>
<html>
      <head>
	        <title>Vliegtuigen</title>
      <link href="styles1.css" rel="Stylesheet"/>
	  </head>
	  <body>
	  	 
	  <form method="POST">
	  <header>
	  <nav>
		<a href="Home.php">Home</a>
		<a href="Vliegtuigen.php">Vliegtuigen</a>
		<a href="Vluchten.php">Planning</a>
		</nav>
	    </header>
		<!-- velden om te wijzigen-->
		<h1>Vluchten:</h1>
        <table>
	    <tr>
		<td>Type vliegtuig:</td>
		<td><input name="vliegtuig" type="text" placeholder="vliegtuig" maxlength=100/><br/></td>
		</tr>	  
		<tr>
		<td>Vertekdatum:</td>
		<td><input name="vertrekdatum" type="date" placeholder="vertrekdatum"/><br/></td>
		</tr>	
		<tr>
		<td>Retourdatum:</td>
		<td> <input name="retourdatum" type="date" placeholder="Retourdatum"/><br/></td>
		</tr>
		<tr>
		<td>Bestemming:</td>
		<td><input name="bestemming" type="text" placeholder="Bestemming" maxlength=100/><br/></td>
		</tr>
		<tr>
		<td>Status:</td>
		<td><input type="radio" Checked id="status" name="status" value="actief">
          <label for="actief">actief</label></br>
		  <input type="radio" Checked id="status" name="status" value="inactief">
          <label for="inactief">inactief</label></br></td>
		</tr>
        </table>
		<input type="submit" name="Wijzigen" Value="wijzigen"/><br/>
		<input type="submit" name="home" value="Terug naar de plannings pagina"/><br/>
	  
<?php
include("Databasevliegtuig.php");
if(isset($_POST['home'])){	
  header('Location: Vluchten.php');
}	
if(isset($_POST["Wijzigen"])){
	
	$wijzig = $_GET['wijzig'];
	
	
$lijst= array();
	$lijst['vliegtuig'] = $_POST['vliegtuig'];
	$lijst['vertrekdatum'] = $_POST['vertrekdatum'];
	$lijst['retourdatum'] = $_POST['retourdatum'];
	$lijst['bestemming'] = $_POST['bestemming'];
	$lijst['status'] = $_POST['status'];
	foreach($lijst as $key => $value)
	{
	 echo $key.":". $value . "<br/>";
    }
	
	
	
	
	
	$vliegtuig=$_POST['vliegtuig'];
	$vertrekdatum=$_POST['vertrekdatum'];
	$retourdatum=$_POST['retourdatum'];
	$bestemming=$_POST['bestemming'];
    $status=$_POST['status'];
	//update van de velden dus de velden wijzigen en zorgen dat ze 
	   $query = "UPDATE planning SET vliegtuig = '$vliegtuig', vertrekdatum = '$vertrekdatum', retourdatum = '$retourdatum',bestemming = '$bestemming', status = '$status' WHERE vluchtnummer  = '$wijzig'";
        $stm = $pdo->prepare($query);
        if ($stm->execute()) {
            echo "Helemaal goed gewijzigd";
        } else {
            echo "Er is helaas iets misgegaan met het wijzigen van de vluchten!";
        }
    }
	
?>
</body>
</form>
</html>