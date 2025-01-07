<?php
$uri = $_SERVER['REQUEST_URI'];
echo '
<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/MoneyGER/home.php">MoneyGER</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link '.($uri=='/MoneyGER/home.php' ? ' active' : '').'" aria-current="page" href="/MoneyGER/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link'.($uri=='/MoneyGER/about.php' ? ' active' : '').'" aria-current="page" href="/MoneyGER/about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link'.($uri=='/MoneyGER/contact.php' ? ' active' : '').'" aria-current="page" href="/MoneyGER/contact.php">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
';

?>