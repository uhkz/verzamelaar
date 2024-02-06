<?php
include('../header.php')
?>
<section class="">
<form action="../includes/signup.inc.php" method="post">
  <div class="container mt-3">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 pt-2 pb-2 text-start">
            <div class="mb-md-5 mt-md-4 ">
              <h2 class="fw-bold mb-2 text-uppercase text-center">Sign up</h2>
              <p class="text-white-50 mb-3 text-center">Please fill in all information correctly.</p>

              <div class="form-outline form-white mb-2">
                <label class="form-label" for="name">First name</label>
                <input type="text" name="name" id="name" class="form-control form-control" />
              </div>

              <div class="form-outline form-white mb-2">
                <label class="form-label" for="lname">Last name</label>
                <input type="text" name="lname" id="lname" class="form-control form-control " />
              </div>
            
              <div class="form-outline form-white mb-2">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control form-control " />
              </div>
            
              <div class="form-outline form-white mb-2">
                <label class="form-label" for="username">Username</label>
                <input type="text" name="uid" id="username" class="form-control form-control " />
              </div>
            
              <div class="form-outline form-white mb-1">
                <label class="form-label" for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd" class="form-control form-control " />
              </div>
            
              <div class="form-outline form-white mb-3">
                <label class="form-label" for="pwd">Repeat password</label>
                <input type="password" name="pwdrepeat" id="pwdrepeat" class="form-control form-control " />
              </div>
              <button class="btn btn-outline-light btn-lg px-5" name="submit" type="submit">Sign Up</button><br><br>
              <p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Sign In</a>
              </p>
              <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            } else if ($_GET["error"] == "invalidusername"){
                echo "<p>The username is invalid!</p>";
            } else if ($_GET["error"] == "invalidemail"){
                echo "<p>The email is invalid!</p>";
            } else if ($_GET["error"] == "passwordsdontmatch"){
                echo "<p>The passwords are not matched!</p>";
            }  else if ($_GET["error"] == "usernametaken"){
                echo "<p>This username or email already exists!</p>";
            } else if ($_GET["error"] == "stmtfailed"){
                echo "<p>Something went wrong. Please try again.</p>";
            } else if ($_GET["error"] == "succes"){
                echo "<p>you have succesfully signed up!</p>";
            }
            if (isset($_GET["success"])) {
                echo "<p>You have successfully signed up!</p>";
            }
        }
    ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
    
</body>
</html>