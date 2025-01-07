<?php
require("connect.php");
if (isset($_GET["rec"])) {
    $query = "DELETE FROM `records` WHERE `records`.`id` =". $_GET["rec"];
    $result = $conn->query($query);
    if ($result) {
        header("Location: /MoneyGER/home.php?del=true");
        exit();
    } else {
        header("Location: /MoneyGER/home.php?del=false");
        exit();
    }
    
}

?>