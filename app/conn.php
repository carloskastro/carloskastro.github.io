<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mase"; //nombre de mi base Datos

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "<button type='button' class='btn btn-success'></button>";
	
} catch (Exception $e) {
	echo "<button type='button' class='btn btn-danger'></button> ".$e->getMessage();
}
?>