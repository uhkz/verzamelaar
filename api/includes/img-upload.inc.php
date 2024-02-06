<?php

if (isset($_POST['submit'])) {

    $newFileName = $_POST['filename'];
    if (empty($newFileName)) {
        $newFileName = "uploads";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES["file"];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png");

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) {
                $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = "../media/gallery/" . $imageFullName;

                $dbname = "dbVerzamelaar.db";
                $conn = new PDO("sqlite:$dbname");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Fetch the user data from the database
                session_start();
                $username = $_SESSION['username'];
                $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                $user = $stmt->fetch();

                if (empty($imageTitle)) {
                    echo "Image title cannot be empty";
                    exit();
                }

                if (empty($imageDesc)) {
                    echo "Image description cannot be empty";
                    exit();
                }

                if (empty($user)) {
                    echo "User information not found";
                    exit();
                }

                $setImageOrder = 1; 

                $sql = "INSERT INTO uploads (titleUploads, descUploads, imgFullNameUploads, orderUploads, userId) VALUES (:title, :desc, :imgFullName, :orderUploads, :userId);";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':title', $imageTitle);
                $stmt->bindParam(':desc', $imageDesc);
                $stmt->bindParam(':imgFullName', $imageFullName);
                $stmt->bindParam(':orderUploads', $setImageOrder);
                $stmt->bindParam(':userId', $user['usersId']);
                $stmt->execute();

                move_uploaded_file($fileTempName, $fileDestination);

                header("Location: ../pages/profile.php?upload=success");
            } else {
                echo "File too big";
                exit();
            }
        } else {
            echo "Error uploading file";
            exit();
        }
    } else {
        echo "Only JPG, JPEG, PNG files are allowed";
        exit();
    }
}
?>
