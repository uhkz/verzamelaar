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
    <img src="../media/profile.png" class="img-thumbnail" width="125" height="125"  alt="..."><br>
    <?php
    echo '<p>Bio:</p>';
    if (isset($_SESSION['username']) && $_SESSION['username'] === $username){ 
     echo '<button type="button" class="mt-5 btn3"  data-bs-toggle="modal" data-bs-target="#addModal">
    <p>Voeg auto toe</p></button>';}
?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Voeg iets toe aan je verzameling</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <?php 
    if (isset($_SESSION['username']) && $_SESSION['username'] === $username){ ?>
      <div class="img-upload">
      <form action="../includes/img-upload.inc.php" method="post" enctype="multipart/form-data" class="row g-3">
          <div class="col-md-6">
              <label for="filename" class="form-label">File Name</label>
              <input type="text" class="form-control" id="filename" name="filename" placeholder="File name" required>
          </div>
          <div class="col-md-6">
              <label for="filetitle" class="form-label">Image Title</label>
              <input type="text" class="form-control" id="filetitle" name="filetitle" placeholder="Image title" required>
          </div>
          <div class="col-12">
              <label for="filedesc" class="form-label">Image Description</label>
              <input type="text" class="form-control" id="filedesc" name="filedesc" placeholder="Image description" required>
          </div>
          <div class="col-12">
              <label for="file" class="form-label">Choose Image</label>
              <input type="file" class="form-control" id="file" name="file" required>
          </div>
      
  </div>
   <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
      </form>
      </div>
    </div>
  </div>
</div>

   
  </div>
    <div class="col-md-8">
      <h2><?php echo "<h2>$username's " ?>verzameling</h2>
      <div class="row gap-5">

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
        $modalId = 'modal_' . $row['idUploads']; // Generate a unique modal ID

        echo '<div class="col-md-2 item fadein">';
        echo '<img src="../media/gallery/'.$row["imgFullNameUploads"].'" class="img-fluid" alt="'.$row['titleUploads'].'" data-bs-toggle="modal" data-bs-target="#'.$modalId.'">'; // Adding data-bs attributes for the modal
        echo '<div>';
        echo '<p class="titles text-center mb-0">' . $row['titleUploads'] . '</p>';
        echo '</div>';
        echo '</div>';

        // Modal Code
        echo '<div class="modal fade" id="'.$modalId.'" tabindex="-1" role="dialog" aria-labelledby="modal_'.$row['idUploads'].'Label" aria-hidden="true">';
        echo '<div class="modal-dialog modal-dialog-centered" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="modal_'.$row['idUploads'].'Label">' . $row['titleUploads'] . '</h5>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<img src="../media/gallery/'.$row["imgFullNameUploads"].'" class="img-fluid" alt="'.$row['titleUploads'].'">';
        echo '<p>' . $row['descUploads'] . '</p>';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
        echo '</div>';
        echo '</div>';
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

<div class="container mt-5 teKoop">
  <div class="row gap-1">
    <div class="col-md-3 me-3"></div>
    <div class="col-md-8">
      <h2>Te Koop</h2>
      <!-- Komt nog -->
      -- Coming soon --
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
