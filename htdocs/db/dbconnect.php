<?php 
$servername = "localhost";
$username = "root";
$password = "MySQLroot";
$schema = "icc";

$dbDetails = array(
	'host' => $servername,
	'user' => $username,
	'pass' => $password,
	'db' => $schema
);

// Create connection
$conn = new mysqli($servername, $username, $password, $schema);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Check session
if(session_status() === PHP_SESSION_NONE){
	session_start();
}

if (!isset($_SESSION['user_id'])){
	$_SESSION['user_id'] = 0;
}
if (!isset($_SESSION['username'])){
	$_SESSION['username'] = "";
}
?>