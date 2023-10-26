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
  <div class="container">
    <div class="banner-container">
      <div class="container-fluid text-center banner">
      <div class="banner-text">
      <h1 class="fw-bold">Welkom bij COLCARS</h1>
      <h4 class="fw-bold">Ontdek de passie voor auto's.</h4>
      </div>
    </div>
    </div>
    <div class="row mt-5">
      <div class="col fs-4"><h3 class="fw-bold">Uitgelichte auto's</h3></div>
    </div>
    
    <div class="items-grid row mt-4">
    <?php
    $dbname = "includes/dbVerzamelaar.db";

    try {
        $conn = new PDO("sqlite:$dbname");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM uploads ORDER BY RANDOM() LIMIT 9";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

      // Loop to create 3 rows
for ($i = 0; $i < 3; $i++) {
  echo '<div class="row mt-5 ms-3">';
  // Loop to create 3 columns in each row
  for ($j = 0; $j < 3; $j++) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($row) {
          $modalId = 'imageModal' . $i . $j; 
          echo '<div class="col lh-3 me-5 fadein">';
          echo '<img src="/media/gallery/' . $row['imgFullNameUploads'] . '" alt="Car Image" class="img-fluid carImage shadow" data-bs-toggle="modal" data-bs-target="#' . $modalId . '">';
          echo '<p class="text-center titles mb-0">' . $row['titleUploads'] . '</p>';
          echo '</div>';
          // Modal Code

          // Get username from userId
          $userId = $row['userId'];
          $sql_username = "SELECT username FROM users WHERE usersId = :userId";
          $stmt_username = $conn->prepare($sql_username);
          $stmt_username->bindParam(':userId', $userId);
          $stmt_username->execute();
          $username_row = $stmt_username->fetch(PDO::FETCH_ASSOC);
          $username = $username_row['username'];


          echo '<div class="modal fade" id="' . $modalId . '" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">';
          echo '<div class="modal-dialog modal-dialog-centered" role="document">';
          echo '<div class="modal-content">';
          echo '<div class="modal-header">';
          echo '<h5 class="modal-title" id="imageModalLabel">' . $row['titleUploads'] . '</h5>';
          echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
          echo '</div>';
          echo '<div class="modal-body">';
          echo '<h3>Van: ' . $username . '</h3>';
          echo '<img src="/media/gallery/' . $row['imgFullNameUploads'] . '" alt="Car Image" class="img-fluid modalImg">';
          echo '<p>' . $row['descUploads'] . '</p>';
          echo '</div>';
          echo '<h4 class="ms-2">Ga naar het profiel van <a href="/pages/profile.php?user=' . $username . '">' . $username . '</a></h4>';
          echo '<div class="modal-footer">';
          
          echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
      }
  }
  echo '</div>';
} 
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</div>
 </div>
 <?php
include ('footer.php');
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>