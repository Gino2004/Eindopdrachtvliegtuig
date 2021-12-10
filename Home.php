<!DOCTYPE html>
<html>
<head>
     <title>Home</title>
	 
	  <link href="styles1.css" rel="stylesheet"/>
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
	<!--alle velden die er in moesten verwerkt zijn -->
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
		<td><input type="radio" Checked id="status" name="status" value="actief">
          <label for="actief">actief</label></br>
		  <input type="radio" Checked id="status" name="status" value="inactief">
          <label for="inactief">inactief</label></br></td>
		</tr>
        </table>
        		
		<h1> Planning:</h1>
		<table>
		<tr>
		<td>Vliegtuig:</td>
		<td> <input name="vliegtuig" type="text" placeholder="Vliegtuig" maxlength=100/><br/></td>
		</tr>	
		<tr>
		<td>Vertrekdatum:</td>
		<td> <input name="vertrekdatum" type="date" placeholder="Vertrekdatum" maxlength=100/><br/></td>
		</tr>
        <tr>
		<td>Retourdatum::</td>
		<td> <input name="retourdatum" type="date" placeholder="Retourdatum" maxlength=100/><br/></td>
		</tr>	
		<tr>
		<td>Bestemming:</td>
		<td> <input name="bestemming" type="text" placeholder="Bestemming" maxlength=100/><br/></td>
		</tr>
        <tr>
		<td>Status:</td>
		<td><input type="radio" Checked id="status2" name="status2" value="actief">
          <label for="actief">actief</label></br>
		  <input type="radio" Checked id="status2" name="status2" value="inactief">
          <label for="inactief">inactief</label></br></td>
		</tr>		
	    </table>
		     <input type="submit" name="btnverstuur" value="verstuur"/><br/>
			
 
 
 
<?php
include("Databasevliegtuig.php");
//alle velden uitlezen 
if(isset($_POST['btnverstuur'])){
	$lijst= array();
	$lijst['type'] = $_POST['type'];
	$lijst['vliegmaatschappij'] = $_POST['vliegmaatschappij'];
	$lijst['status'] = $_POST['status'];
	$lijst['vliegtuig'] = $_POST['vliegtuig'];
	$lijst['vertrekdatum'] = $_POST['vertrekdatum'];
	$lijst['retourdatum'] = $_POST['retourdatum'];
	$lijst['bestemming'] = $_POST['bestemming']; 
	$lijst['status'] = $_POST['status'];
	foreach($lijst as $key => $value)
	{
	 echo $key.":". $value . "<br/>";
    }	
	$type=$_POST['type'];
	$vliegmaatschappij=$_POST['vliegmaatschappij'];
    $status=$_POST['status'];
	$vliegtuig=$_POST['vliegtuig'];
	$vertrekdatum=$_POST['vertrekdatum'];
    $retourdatum=$_POST['retourdatum'];
	$bestemming=$_POST['bestemming'];
	$status2=$_POST['status2'];
	
	
	
	$query = "INSERT INTO vliegtuigen (type,vliegmaatschappij,status) VALUES ".
	   	   "('$type','$vliegmaatschappij','$status2')";	   
	
    $stm= $pdo->prepare($query);
        
    if($stm->execute())
	{
		echo"";
		
	
	}else echo "query is niet goed uitgevoerd";
	 
	 
	 
	 $query = "INSERT INTO planning (vliegtuig,vertrekdatum,retourdatum,bestemming,status) VALUES ".
	   	   "('$vliegtuig','$vertrekdatum','$retourdatum','$bestemming','$status')";
		   
		   
		   $stm= $pdo->prepare($query);
        
    if($stm->execute())
	{
		echo"";
		
	
	}else echo "query is niet goed uitgevoerd";


}
?>
 </body>
  </form>
  </html>