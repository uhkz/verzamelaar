<?php
  $dbname = "includes/dbVerzamelaar.db";

  try {
      $conn = new PDO("sqlite:$dbname");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM uploads";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "Title: " . $row["titleUploads"] . "<br>";
          echo "Description: " . $row["descUploads"] . "<br>";
          echo "Image: " . $row["imgFullNameUploads"] . "<br>";
          echo "<hr>";
      }
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
?>
