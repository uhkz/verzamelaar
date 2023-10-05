<?php 
    include ('../header.php');
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
?>



<div class="container mt-3 teKoop">
  <div class="row gap-1">
    <div class="col-md-3 profile me-3"><?php echo "<h1>Profile: $username</h1>"?></div>
    <div class="col-md-8">
      <h2>Te koop</h2>
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





