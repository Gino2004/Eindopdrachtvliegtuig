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
		<h1>Vliegtuigen:</h1>
        <table>
	    <tr>
		<td>Type vliegtuig:</td>
		<td><input name="type" type="text" placeholder="Type vliegtuig" maxlength=100/><br/></td>
		</tr>	  
		<tr>
		<td>Vliegmaatschappij:</td>
		<td> <input name="vliegmaatschappij" type="text" placeholder="Vliegmaatschappij" maxlength=100/><br/></td>
		</tr>	
		<tr>
		<td>Status:</td>
		<td> <input type="radio" Checked id="status" name="status" value="actief">
          <label for="actief">actief</label></br>
		  <input type="radio" Checked id="status" name="status" value="inactief">
          <label for="inactief">inactief</label></br></td>
		</tr>
        </table>
		<input type="submit" name="Wijzigen" Value="wijzigen"/><br/>
		<input type="submit" name="home" value="Terug naar de vliegtuigen pagina"/><br/>
	  
<?php
include("Databasevliegtuig.php");
if(isset($_POST['home'])){	
  header('Location: Vliegtuigen.php');
}		
if(isset($_POST["Wijzigen"])){
	
	$wijzig = $_GET['wijzig'];
	
	$lijst= array();
	$lijst['type'] = $_POST['type'];
	$lijst['vliegmaatschappij'] = $_POST['vliegmaatschappij'];
	$lijst['status'] = $_POST['status'];
	foreach($lijst as $key => $value)
	{
	 echo $key.":". $value . "<br/>";
    }
	
	$type=$_POST['type'];
	$vliegmaatschappij=$_POST['vliegmaatschappij'];
    $status=$_POST['status'];
	//update van de velden dus de velden wijzigen en zorgen dat ze 
	   $query = "UPDATE vliegtuigen SET type = '$type', vliegmaatschappij = '$vliegmaatschappij', status = '$status' WHERE vliegtuignummer  = '$wijzig'";
        $stm = $pdo->prepare($query);
        if ($stm->execute()) {
            echo "Helemaal goed gewijzigd";
        } else {
            echo "Er is helaas iets misgegaan met het wijzigen van de vliegtuigen!";
        }
    }
	
?>
</body>
</form>
</html>