<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyGER - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="overflow-x-hidden">
    <?php
    session_start();
    if (!(isset($_SESSION['username']))) {
        header("Location: /MoneyGER/");
    }
    require("Components/navbar.php");
    echo '
    <h2 class="text-center" style="margin: 2rem auto;">Welcome <strong>'.$_SESSION['username'].'</strong> to MoneyGER!</h2>
    ';
    if (isset($_GET['record'])=="true") {
        echo '<div class="alert alert-success alert-dismissible fade show" style="width:71rem;margin:auto" role="alert">
  <strong>Success!</strong> Record added successfully.
  <a href="/MoneyGER/home.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>';
    }
    elseif (isset($_GET['record'])=="false") {
        echo '<div class="alert alert-danger alert-dismissible fade show" style="width:71rem;margin:auto" role="alert">
  <strong>Error!</strong> Errors while adding record.
  <a href="/MoneyGER/home.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>';
    }
    elseif (isset($_GET['del'])=="true") {
        echo '<div class="alert alert-success alert-dismissible fade show" style="width:71rem;margin:auto" role="alert">
  <strong>Success!</strong> Record deleted successfully.
  <a href="/MoneyGER/home.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>';
    }
    elseif (isset($_GET['del'])=="false") {
        echo '<div class="alert alert-danger alert-dismissible fade show" style="width:71rem;margin:auto" role="alert">
  <strong>Error!</strong> Errors while deleting record.
  <a href="/MoneyGER/home.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>';
    }
    elseif (isset($_GET['upd'])=="true") {
        echo '<div class="alert alert-success alert-dismissible fade show" style="width:71rem;margin:auto" role="alert">
  <strong>Success!</strong> Record updated successfully.
  <a href="/MoneyGER/home.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>';
    }
    elseif (isset($_GET['upd'])=="false") {
        echo '<div class="alert alert-danger alert-dismissible fade show" style="width:71rem;margin:auto" role="alert">
  <strong>Error!</strong> Errors while updating record.
  <a href="/MoneyGER/home.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>';
    }
    require("Components/form.php");
    require("ServerActions/connect.php");
    $query = "SELECT * FROM `records` WHERE user='".$_SESSION['username']."'";
    $result=$conn->query($query);
    echo'
    <h2 class="text-start" style="margin: 20px 12rem;">Your Records</h2>';
    if ($result->num_rows==0) {
        echo '<h4 class="text-start" style="margin: 0px 12rem;">All your records shall appear here.</h4>';
    }
    else{
    echo '<div class="d-flex justify-content-between flex-wrap container" style="width:76%">';
    while($row=$result->fetch_assoc()){
        echo '
    
    <div class="card px-3 py-2 my-3" style="width: 18rem;">
        <div className="card-body">
            <h5 className="card-title">'.$row["Date"].' (₹'.$row["MoneySpent"].') </h5>
            <h6 className="card-subtitle mb-2 text-body-secondary">'.$row["Day"].'</h6>
            <p className="card-text">'.$row["SpentOn"].'</p>
            <div class="d-flex justify-content-between w-full">
                <a href="ServerActions/UpdRec.php?rec='.$row["id"].'" class="text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                    </svg>
                </a>
                <a href="ServerActions/DelRec.php?rec='.$row["id"].'" class="text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>';
    }
}
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>