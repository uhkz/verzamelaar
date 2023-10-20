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

                if (empty($imageTitle) || empty($imageDesc)) {
                    header("Location: ../pages/profile.php?upload=empty");
                    exit();
                } else {
                    $sql = "SELECT * FROM uploads;";
                    $stmt = $conn->query($sql);
                    $rowCount = count($stmt->fetchAll());

                    $setImageOrder = $rowCount + 1;

                    $sql = "INSERT INTO uploads (titleUploads, descUploads, imgFullNameUploads, orderUploads) VALUES (:title, :desc, :imgFullName, :orderUploads);";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':title', $imageTitle);
                    $stmt->bindParam(':desc', $imageDesc);
                    $stmt->bindParam(':imgFullName', $imageFullName);
                    $stmt->bindParam(':orderUploads', $setImageOrder);
                    $stmt->execute();

                    move_uploaded_file($fileTempName, $fileDestination);

                    header("Location: ../pages/profile.php?upload=success");
                }
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
