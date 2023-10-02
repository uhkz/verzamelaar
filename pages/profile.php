<?php 
    include ('../header.php');
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
?>

<div class="card " style="width: 18rem;">
  <img src="../media/profile.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">
        <?php
        echo "<h5>$username</h5>"
        ?>
    </h5>
    <p class="card-text">Profiel info.</p>
    <a href="#" class="btn disabled">Edit</a>
  </div>
</div>

