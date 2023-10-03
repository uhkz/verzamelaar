<?php 
    include ('../header.php');
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
?>

<?php
  echo "<h1>Profile: $username</h1>"
?>