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
		<td>Datum filteren:</td>
		<!--velden om op datum te filteren-->
		<td><input name="datumfilter" type="date" placeholder="Datumfilter" maxlength=100/></td>
		<td><input type="submit" name="filteren" value="filter"/></td>
		<td><input type="submit" name="alles" value="Tonen alles van planning"/></td>
		<tr>
		<td>Vluchtnummer:</td>
		<td>Vliegtuig:</td>
		<td>Vertrekdatum:</td>
		<td>Retourdatum:</td>
		<td>Bestemming:</td>
		<td>Status:</td>
		<td>Wijzig:</td>
		<td>Verwijderen planning:</td>
		</tr>
		
<?php
include("Databasevliegtuig.php");
if(isset($_POST['filteren'])){
	
$datumfilter= $_POST['datumfilter'];


//Uitlezen van de velden 
$query = "SELECT*FROM planning WHERE vertrekdatum = '$datumfilter'";
	$stm= $pdo->prepare($query);
    if($stm->execute())
	{
		
	$result= $stm->fetchALL(PDO::FETCH_OBJ);
		 foreach($result as $persoon)
		 {
			 echo "<tr>";
			 echo "<td>".$persoon->vluchtnummer."</td>";
			 echo "<td>".$persoon->vliegtuig."</td>";
			 echo "<td>".$persoon->vertrekdatum."</td>";
			 echo "<td>".$persoon->retourdatum."</td>";
			 echo "<td>".$persoon->bestemming."</td>";
			 echo "<td>".$persoon->status."</td>";
			 echo "<td>"."<a href='Vluchtenwijzigen.php?wijzig=$persoon->vluchtnummer'>Wijzig</a>"."</td>";
			 echo "<td>"."<a href='Verwijderenplanning.php?verwijder=$persoon->vluchtnummer'>Verwijderen planning</a>"."</td>";
			 echo "</tr>";
	     }
			
	}
	
}
?>	
	

<?php
if(isset($_POST['alles'])){
$query= "SELECT*FROM planning";
	$stm= $pdo->prepare($query);
    if($stm->execute())
	{
		
	$result= $stm->fetchALL(PDO::FETCH_OBJ);
		 foreach($result as $persoon)
		 {
			 echo "<tr>";
			 echo "<td>".$persoon->vluchtnummer."</td>";
			 echo "<td>".$persoon->vliegtuig."</td>";
			 echo "<td>".$persoon->vertrekdatum."</td>";
			 echo "<td>".$persoon->retourdatum."</td>";
			 echo "<td>".$persoon->bestemming."</td>";
			 echo "<td>".$persoon->status."</td>";
			 echo "<td>"."<a href='Vluchtenwijzigen.php?wijzig=$persoon->vluchtnummer'>Wijzig</a>"."</td>";
			 echo "<td>"."<a href='Verwijderenplanning.php?verwijder=$persoon->vluchtnummer'>Verwijderen planning</a>"."</td>";
			 echo "</tr>";
	     }
			echo"</table>";


			
				
			
		

	    

}
}
?>
        </body>
	  </form>
	  </html>