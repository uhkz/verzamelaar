<?php
    include ('../header.php');
?>

<section>
<form action="../includes/login.inc.php" method="post">
            <div class="mb-3">
              <label for="" class="form-label">Username</label>
              <input type="text" class="form-control" name="uid" placeholder="username">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password" class="form-control" name="pwd" placeholder="Password">
            </div>
            <button type="submit" name="submit" class="btn w-100">Sign in</button>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields!</p>";
            } else if ($_GET["error"] == "wronglogin"){
                echo "<p>Incorrect login information!</p>";
            }
        }
    ?>
          </form>
        </section>