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
		<table class="Datum">
		<tr>
		<td><input type="submit" name="Verwijderen" value="Verwijderen vliegtuigen"/></td>
		</tr>
		<tr>
		<td><input type="submit" name="home" value="Terug naar de vliegtuigen pagina"/></td>
		</tr>
		</table>

<?php
include("Databasevliegtuig.php");
if(isset($_POST['home'])){	
  header('Location: Vliegtuigen.php');
}		
if(isset($_POST['Verwijderen'])){
$verwijder= $_GET['verwijder'];
//$query om de velden te verwijderen
$query = "DELETE FROM vliegtuigen  WHERE vliegtuignummer='$verwijder'";

    $stm=$pdo->prepare($query);

    if($stm->execute())
    {
       echo"succesvol verwijderd <br/>";


    }else echo "niet succesvol verwijderd<br/> $query";


}

?>
</body>
</form>
</html>