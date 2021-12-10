<?php
$host= "localhost";
$dbname = "Vliegtuigen";
$user ="root";
$passwd="";


try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user, $passwd);
}  catch(PDOException $ex){
    echo "verbinding mislukt";
}
?>