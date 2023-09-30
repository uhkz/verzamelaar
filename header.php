<?php
  session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <title>COLCAR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="/style/main.css">
  <script src="https://kit.fontawesome.com/b2f72f1c34.js" crossorigin="anonymous"></script>
</head>
<body>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Shop</a>
          </li>
        </ul>
        <a class="btn me-3 signup d-lg-none" href="/pages/login.php" role="button"><i class="fa-solid fa-user"></i></a> 
        <a class="btn me-3 signup d-lg-none" href="/pages/registration.php" role="button"><i class="fa-solid fa-user-pen"></i></a>
      </div>

      <?php 
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo "<a class='btn me-3 signup d-none d-lg-block' href='/pages/profile.php' role='button'>" . $username ."</a> ";
            echo "<a class='btn me-3 signup d-none d-lg-block' href='includes/logout.inc.php' role='button'><i class='fa-solid fa-arrow-right-from-bracket'></i></a>";
        } else {
            echo "<a class='btn me-3 signup d-none d-lg-block' href='/pages/login.php' role='button'><i class='fa-solid fa-user'></i></a> ";
            echo "<a class='btn me-3 signup d-none d-lg-block' href='pages/registration.php' role='button'><i class='fa-solid fa-user-pen'></i></a>";
        }
      ?>
      <!--<a class="btn me-3 signup d-none d-lg-block" href="/pages/login.php" role="button"><i class="fa-solid fa-user"></i></a> 
      <a class="btn me-3 signup d-none d-lg-block" href="pages/registration.php" role="button"><i class="fa-solid fa-user-pen"></i></a> -->
    </div>
  </nav>
  <!--EINDE NAVBAR-->