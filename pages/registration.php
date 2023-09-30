<?php
include('../header.php')
?>
    <section class="signup-form">
        <h2>Sign up</h2>
        <form action="../includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="First name">
            <input type="text" name="lname" placeholder="Last name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdrepeat" placeholder="Repeat password">
            <button type="submit" name="submit">Sign Up</button>
        </form>
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

    </section>
</body>
</html>