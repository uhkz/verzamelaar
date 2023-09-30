<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLCAR</title>
</head>
<body>
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
    </section>
</body>
</html>