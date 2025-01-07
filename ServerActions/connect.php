<?php 
$servername="localhost";
$username="root";
$password="";
$db="moneyger";
$conn = new mysqli($servername,$username,$password,$db);
if ($conn->connect_error) {
    die("Failed ".mysqli_connect_error());
}
?>