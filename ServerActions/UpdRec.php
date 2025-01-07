<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyGER - UpdateRec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php 

require("connect.php");

if (isset($_GET["rec"])) {
    $rec_id = $_GET["rec"];
    $query = "SELECT * FROM `records` WHERE `records`.`id` = $rec_id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        require("../Components/navbar.php");

        echo'
        <h2 class="text-center" style="margin: 2rem auto;">Update Record</h2>
        <form class="row g-3 mt-5 justify-content-md-center" method="post" action="UpdRec.php?id='.$rec_id.'">
              <div class="col-md-3">
                <label for="inputAmt" class="form-label">Enter the Amount</label>
                <input type="text" name="MoneySpent" value="' . $row["MoneySpent"] . '" class="form-control" id="inputAmt" autocomplete="off" />
              </div>

              <div class="col-md-3">
                <label for="inputState" class="form-label">Day</label>
                <select name="Day" id="inputState" class="form-select">
                  <option>Choose..</option>
                  <option value="Monday" ' . ($row["Day"] == "Monday" ? "selected" : "") . '>Monday</option>
                  <option value="Tuesday" ' . ($row["Day"] == "Tuesday" ? "selected" : "") . '>Tuesday</option>
                  <option value="Wednesday" ' . ($row["Day"] == "Wednesday" ? "selected" : "") . '>Wednesday</option>
                  <option value="Thursday" ' . ($row["Day"] == "Thursday" ? "selected" : "") . '>Thursday</option>
                  <option value="Friday" ' . ($row["Day"] == "Friday" ? "selected" : "") . '>Friday</option>
                  <option value="Saturday" ' . ($row["Day"] == "Saturday" ? "selected" : "") . '>Saturday</option>
                  <option value="Sunday" ' . ($row["Day"] == "Sunday" ? "selected" : "") . '>Sunday</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="date" class="form-label">Date</label>
                <input id="date" type="Date" value="' . $row["Date"] . '" name="Date" class="form-control"/>
              </div>
              <div class="col-md-9">
                <label for="exampleFormControlTextarea1" class="form-label">It was spent on?</label>
                <textarea class="form-control" name="SpentOn" id="exampleFormControlTextarea1" rows="6" style="resize: none;">' . $row["SpentOn"] . '</textarea>
              </div>
              <div class="col-md-9">
                <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary col-md-3">Update</button>
                </div>
              </div>
            </form>';
    } else {
        echo 'No record found';
    }
}
elseif($_SERVER['REQUEST_METHOD']=='POST'){
    session_start();
    $MoneySpent = $_POST['MoneySpent'];
    $Day = $_POST['Day'];
    $Date = $_POST['Date'];
    $SpentOn = $_POST['SpentOn'];
    $sql = "UPDATE `records` SET `MoneySpent`='$MoneySpent', `Day`='$Day', `Date`='$Date', `SpentOn`='$SpentOn' WHERE `records`.`id`=".$_GET['id'] ." AND `records`.`user`=".$_SESSION['username'];
    $result = $conn->query($sql);
    if($result){
      header("Location: /MoneyGER/home.php?upd=true");
      exit();
    }else{
      header("Location: /MoneyGER/home.php?upd=false");
      exit();
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>
