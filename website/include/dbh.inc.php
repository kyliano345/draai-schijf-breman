<?php 
$dbServername = "localhost";
$dbUsername = "oekt";
$dbPassword = "oektbreman";
$dbName = "oekt";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
  die("Conn error!");
} 

?>