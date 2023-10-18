<?php 
    include ('../header.php');
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
?>

<div class="container mt-3 teKoop">
  <div class="row gap-1">
    <div class="col-md-3 profile me-3"><?php echo "<h1>$username</h1>"?>
    <?php 
    if (isset($_SESSION['username'])){
      echo '<div class="img-upload">
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
      <h2>Te koop</h2>
      <div class="row gap-3">
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
  </div>
  </div>
</div>


<div class="container mt-3 verzameling">
  <div class="row gap-1">
    <div class="col-md-3 me-3"></div>
    <div class="col-md-8">
      <h2>Verzameling</h2>
      <div class="row gap-1">
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
    <div class="col-md-2 item">image</div>
  </div>
  </div>
</div>





