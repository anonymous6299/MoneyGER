<?php 
require("connect.php");
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
  $MoneySpent = $_POST['MoneySpent'];
  $Day = $_POST['Day'];
  $Date = $_POST['Date'];
  $SpentOn = $_POST['SpentOn'];
  $sql = "INSERT INTO `records` (`user`,`MoneySpent`, `Day`, `Date`, `SpentOn`) VALUES ('" .$_SESSION['username']."','$MoneySpent', '$Day', '$Date', '$SpentOn')";
  $result = $conn->query($sql);
  if($result){
    header("Location: /MoneyGER/home.php?record=true");
    exit();
  }else{
    header("Location: /MoneyGER/home.php?record=false");
    exit();
  }
}

?>