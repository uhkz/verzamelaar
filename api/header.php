<?php
  session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <title>COLCAR</title>
  <link rel="icon" type="image/x-icon" href="/media/favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--FONT-->
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap');
</style>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="/style/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b2f72f1c34.js" crossorigin="anonymous"></script>
</head>
<body>

  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php"><img class="logo" width="60" height="48" src="../../media/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
          </li>
          <li class="nav-item">
          <?php
          if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
             echo '<a class="nav-link" href="../pages/profile.php">Profile</a>';
          } else {
            echo '<a class="nav-link" href="../pages/login.php">Profile</a>';
          }
          ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="showMessage()">Shop</a>
          </li>
        </ul>
        <?php 
         if (isset($_SESSION["username"])) {
          $username = $_SESSION["username"];
        echo '<a class="btn btn2 me-3 signup d-lg-none" href="../pages/profile.php" role="button"><i class="fa-solid fa-user"></i></a>';
        echo '<a class="btn btn2 me-3 signup d-lg-none" href="../includes/logout.inc.php" role="button"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>';
        } else {
          echo '<a class="btn btn2 me-3 signup d-lg-none" href="../pages/login.php" role="button"><i class="fa-solid fa-user"></i></a>';
          echo '<a class="btn btn2 me-3 signup d-lg-none" href="../pages/registration.php" role="button"><i class="fa-solid fa-user-pen"></i></a>';
          
        }?>
        </div>

      <?php 
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo "<a class='btn btn2 me-3 signup d-none d-lg-block' href='../pages/profile.php' role='button'>" . $username ."</a> ";
            echo "<a class='btn btn2 me-3 signup d-none d-lg-block' href='../includes/logout.inc.php' role='button'><i class='fa-solid fa-arrow-right-from-bracket'></i></a>";
        } else {
            echo "<a class='btn btn2 me-3 signup d-none d-lg-block' href='../pages/login.php' role='button'><i class='fa-solid fa-user'></i></a> ";
            echo "<a class='btn btn2 me-3 signup d-none d-lg-block' href='../pages/registration.php' role='button'><i class='fa-solid fa-user-pen'></i></a>";
        }
      ?>
      </div>
  </nav>
  <!--EINDE NAVBAR-->
  
  <script src="../scripts/alert.js"></script>