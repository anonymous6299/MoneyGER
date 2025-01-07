<?php
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST["username"];
    $password= $_POST["password"];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result=$conn->query($query);
    $row=$result->fetch_assoc();
    $pass = password_verify($password, $row['password']);
    if (($row) && password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['username']=$username;
        header("Location: /MoneyGER/home.php");
        exit();
    }
    else{
        header("Location: /MoneyGER?user=false");
        exit();
    }
}
$conn->close();
?>