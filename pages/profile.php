<?php 
    include ('../header.php');
    $username = ""; // Initialize the username variable

    // Check if the 'user' parameter is set in the URL
    if (isset($_GET["user"])) {
        $requestedUser = $_GET["user"];

        // Assuming $requestedUser is the username
        $username = $requestedUser;
    } else if (isset($_SESSION["username"])) {
        // If the 'user' parameter is not set, check the session for the username
        $username = $_SESSION["username"];
    } else {
        // Redirect the user if the user identifier is not provided
        header("Location: ../index.php");
        exit();
    }
?>

<div class="container mt-3 verzameling">
  <div class="row gap-1">
    <div class="col-md-3 profile me-3"><?php echo "<h1>$username</h1>"?>
    <?php 
    if (isset($_SESSION['username']) && $_SESSION['username'] === $username){
      echo '<div class="img-upload">
      <p>Voeg iets aan je verzameling toe.</p>
      <form action="../includes/img-upload.inc.php" method="post" enctype="multipart/form-data">
      <input type="text" name="filename" placeholder="File name">
      <input type="text" name="filetitle" placeholder="Image title">
      <input type="text" name="filedesc" placeholder="Image description">
      <input type="file" name="file">
      <button type="submit" name="submit">Upload</button>
      </form>
    </div>';
  }
    ?>
  </div>
    <div class="col-md-8">
      <h2><?php echo "<h2>$username's " ?>Verzameling</h2>
      <div class="row gap-3">

    <?php
    $dbname = "../includes/dbVerzamelaar.db";

    try {
        $conn = new PDO("sqlite:$dbname");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM uploads WHERE userId = (SELECT usersId FROM users WHERE username = :username) ORDER BY orderUploads DESC;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo '<div class="col-md-2 item">';
          echo '<img src="../media/gallery/'.$row["imgFullNameUploads"].'" class="img-fluid" alt="'.$row['titleUploads'].'">';
          echo '<div>';
          echo '<p class="fs-4 mb-0">' . $row['titleUploads'] . '</p>';
          
          echo '</div>';
          echo '</div>';
          
            
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
  </div>
  </div>
</div>

<div class="container mt-3 teKoop">
  <div class="row gap-1">
    <div class="col-md-3 me-3"></div>
    <div class="col-md-8">
      <h2>Te Koop</h2>
      <!-- Add the content you want to display here -->
    </div>
  </div>
</div>
