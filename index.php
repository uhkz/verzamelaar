  <?php 
  include('header.php');

  ?>
  <div class="container">
    <div class="banner-container">
      <div class="container-fluid text-center banner">
      <div class="banner-text">
      <h1>Welkom bij COLCARS</h1>
      <p>Ontdek de passie voor auto's.</p>
      </div>
    </div>
    </div>
    <div class="row mt-5">
      <div class="col fs-4">Uitgelichte auto's</div>
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
  echo '<div class="row mt-4">';
  // Loop to create 3 columns in each row
  for ($j = 0; $j < 3; $j++) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($row) {
          $modalId = 'imageModal' . $i . $j; 
          echo '<div class="col-lg lh-3 me-5 fadein">';
          echo '<img src="/media/gallery/' . $row['imgFullNameUploads'] . '" alt="Car Image" class="img-fluid carImage shadow" data-bs-toggle="modal" data-bs-target="#' . $modalId . '">';
          echo '<p class="fs-4 mb-0">' . $row['titleUploads'] . '</p>';
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
          echo '<img src="/media/gallery/' . $row['imgFullNameUploads'] . '" alt="Car Image" class="img-fluid">';
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