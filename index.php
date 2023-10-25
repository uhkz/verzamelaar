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
                    echo '<div class="col-sm lh-3 me-5">';
                    echo '<img src="/media/gallery/' . $row['imgFullNameUploads'] . '" alt="Car Image">';
                    echo '<p class="fs-4 mb-0">' . $row['titleUploads'] . '</p>';
                    echo '<p class="fs-6 mb-0">' . $row['descUploads'] . '</p>';
                    echo '<p class="fs-6"> prijs </p>';
                    echo '</div>';
                }
            }
            echo '</div>'; // Close the row
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</div>



    <!--row 1
    <div class="items-grid row mt-4">
      <div class="col-sm lh-3 me-5">
        <img src="/media/car-example1.avif" alt="">
        <p class="fs-4 mb-0">Naam</p>
        <p class="fs-6 mb-0">Beschrijving</p>
        <p class="fs-6">Prijs</p>
      </div>
      <div class="col-sm me-5">
        <img src="/media/car-example2.avif" alt="">
        <p class="fs-4 mb-0">Naam</p>
        <p class="fs-6 mb-0">Beschrijving</p>
        <p class="fs-6">Prijs</p>
      </div>
      <div class="col-sm">
        <img src="/media/car-example3.avif" alt="">
        <p class="fs-4 mb-0">Naam</p>
        <p class="fs-6 mb-0">Beschrijving</p>
        <p class="fs-6">Prijs</p>
      </div>
      row 2
      <div class="items-grid row mt-4">
        <div class="col-sm lh-3 me-5">
          <img src="/media/car-example4.avif" alt="">
          <p class="fs-4 mb-0">Naam</p>
          <p class="fs-6 mb-0">Beschrijving</p>
          <p class="fs-6">Prijs</p>
        </div>
        <div class="col-sm me-5">
          <img src="/media/car-example5.avif" alt="">
          <p class="fs-4 mb-0">Naam</p>
          <p class="fs-6 mb-0">Beschrijving</p>
          <p class="fs-6">Prijs</p>
        </div>
        <div class="col-sm">
          <img src="/media/car-example6.avif" alt="">
          <p class="fs-4 mb-0">Naam</p>
          <p class="fs-6 mb-0">Beschrijving</p>
          <p class="fs-6">Prijs</p>
        </div>
        row 3
        <div class="items-grid row mt-4">
          <div class="col-sm lh-3 me-5">
            <img src="/media/car-example7.avif" alt="">
            <p class="fs-4 mb-0">Naam</p>
            <p class="fs-6 mb-0">Beschrijving</p>
            <p class="fs-6">Prijs</p>
          </div>
          <div class="col-sm me-5">
            <img src="/media/car-example8.avif" alt="">
            <p class="fs-4 mb-0">Naam</p>
            <p class="fs-6 mb-0">Beschrijving</p>
            <p class="fs-6">Prijs</p>
          </div>
          <div class="col-sm">
            <img src="/media/car-example9.avif" alt="">
            <p class="fs-4 mb-0">Naam</p>
            <p class="fs-6 mb-0">Beschrijving</p>
            <p class="fs-6">Prijs</p>
          </div>
        </div> -->
      </div>


      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>