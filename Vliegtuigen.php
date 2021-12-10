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
		<!-- class voor dat het netjes er uit komt te zien -->
		<table class="Vliegtuig">
		<tr>
		<td><input type="submit" name="vliegtuigen" value="Toon alles van vliegtuigen"/></td>
		<td><input type="submit" name="actief" value="Tonen alle actieven vliegtuigen"/></td>
		</tr>
		<tr>
		<td>Vliegtuignummer:</td>
		<td>Type:</td>
		<td>Vliegtuigmaatschappij:</td>
		<td>Status:</td>
		<td>Wijzig:</td>
		<td>Verwijderen vliegtuigen:</td>
		</tr>
		
<?php
include("Databasevliegtuig.php");
if(isset($_POST['vliegtuigen'])){
$query = "SELECT*FROM vliegtuigen";
	$stm= $pdo->prepare($query);
    if($stm->execute())
	{
		
	$result= $stm->fetchALL(PDO::FETCH_OBJ);
		 foreach($result as $persoon)
		 {
			 echo "<tr>";
			 echo "<td>".$persoon->vliegtuignummer."</td>";
			 echo "<td>".$persoon->type."</td>";
			 echo "<td>".$persoon->vliegmaatschappij."</td>"; 
			  echo "<td>".$persoon->status."</td>";
	//linke aangemaakt om te verwijderen en te wijzigen van data			  
			 echo "<td>"."<a href='Vliegtuigenwijzigen.php?wijzig=$persoon->vliegtuignummer'>Wijzig</a>"."</td>";
			 echo "<td>"."<a href='Verwijderenvliegtuigen.php?verwijder=$persoon->vliegtuignummer'>Verwijderen vliegtuigen</a>"."</td>";
			 echo "</tr>";
	     }
			echo"</table>";

	}
}
?>

<?php
if(isset($_POST['actief'])){
$query = "SELECT*FROM vliegtuigen WHERE status = 'actief'";
	$stm= $pdo->prepare($query);
    if($stm->execute())
	{
		
	$result= $stm->fetchALL(PDO::FETCH_OBJ);
		 foreach($result as $persoon)
		 {
			 echo "<tr>";
			 echo "<td>".$persoon->vliegtuignummer."</td>";
			 echo "<td>".$persoon->type."</td>";
			 echo "<td>".$persoon->vliegmaatschappij."</td>";
			 echo "<td>".$persoon->status."</td>";
			 echo "<td>"."<a href='Vliegtuigenwijzigen.php?wijzig=$persoon->vliegtuignummer'>Wijzig</a>"."</td>";
			 echo "<td>"."<a href='Verwijderenvliegtuigen.php?verwijder=$persoon->vliegtuignummer'>Verwijderen planning</a>"."</td>";
			 
			 echo "</tr>";
	     }
			echo"</table>";

}
}
?>
        </body>
	  </form>
	  </html>