<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyGER - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <h1 class="text-center" style="margin: 4rem 0px 4rem 0px;">SignIn to MoneyGER</h1>
  <form class="container d-flex flex-column justify-content-center" action="ServerActions/SignIn.php" style="width: 40rem;" method="post">
<?php
session_start();
if (isset($_SESSION['username'])) {
  header("Location: /MoneyGER/home.php");
}
if (isset($_GET["user"])) {
  if ($_GET["user"]=="false"){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> No user found. Enter valid credentials or SignUp
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  else{
    header("Location: home.php");
    exit();
  }
}
echo '
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input autocomplete="off" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input autocomplete="off" type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary mt-3">SignIn</button>
  <a href="/MoneyGER/signup.php" class=" text-center" style="margin: 4rem 0px 4rem 0px; color: black;">Not having an Account?</a>
</form>
';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>