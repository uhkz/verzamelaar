<?php

function emptyInput($name, $lname, $email, $uid, $pwd, $pwdRepeat){
    $result;

    if (empty($name) && empty($lname) && empty($email) && empty($uid) && empty($pwd) && empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($uid){
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $uid, $email){
    $sql = "SELECT * FROM users WHERE username = :uid OR email = :email;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':uid', $uid);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $resultData = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resultData; // Returns an associative array or false
}

function createUser($conn, $name, $lname, $email, $uid, $pwd) {
    $sql = "INSERT INTO users (name, lname, email, username, pwd) VALUES (:name, :lname, :email, :uid, :pwd);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':uid', $uid);
    $stmt->bindParam(':pwd', $pwd);

    if ($stmt->execute()) {
        header("location: ../index.php?success");
        exit();
    } else {
        header("location: ../registration.php?error-stmtfailed");
        exit();
    }
}
