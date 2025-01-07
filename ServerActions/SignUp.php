<?php
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password= $_POST["password"];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result=$conn->query($query);
    if ($result->num_rows!=0) {
        header("Location: /MoneyGER/signup.php?user=true");
        exit();
    }
    else{
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$hash');";
        $result=$conn->query($query);
        if ($result===TRUE) {
            header("Location: /MoneyGER/index.php");
            exit();
        }
    }
}
$conn->close();
?>