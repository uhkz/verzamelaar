<?php
    include ('../header.php');
?>
<section class="">
<form action="../includes/login.inc.php" method="post">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              <div class="form-outline form-white mb-4">
                <input type="text" name="uid" id="username" class="form-control form-control-lg" />
                <label class="form-label" for="username">Username</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" name="pwd" id="password" class="form-control form-control-lg" />
                <label class="form-label" for="password">Password</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" name="submit" type="submit">Login</button><br> <br>
   <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput"){
                echo "<h3>Fill in all fields!</h3>";
            } else if ($_GET["error"] == "wronglogin"){
                echo "<h3>Incorrect login information!</h3>";
            } else if ($_GET["error"] == "userdoesntexist"){
              echo "<h3>This username does not exist.</h3>";
            }
        }
    ?>
            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="registration.php" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>

