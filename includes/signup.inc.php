<?php

if (isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInput($name, $lname, $email, $uid, $pwd, $pwdRepeat) !== false) {
        header("location: ../pages/registration.php?error=emptyinput");
        exit();
    }
    if (invalidUid($uid) !== false) {
        header("location: ../pages/registration.php?error=invalidusername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../pages/registration.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) === true) {
        header("location: ../pages/registration.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $uid, $email) !== false) {
        header("location: ../pages/registration.php?error=usernametaken");
        exit();
    }
    
    createUser($conn, $name, $lname, $email, $uid, $pwd);

} else {
    header("location: ../pages/registration.php");
    exit();
}