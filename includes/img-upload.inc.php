<?php

if (isset($_POST['submit'])) {

    $newFileName = $_POST['filename'];
    if ($_POST['filename']){
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
            if ($fileSize < 2000000){

            } else {
                echo "file to big";
                exit();
            }
        } else {
            echo "Error";
            exit();
        }
    } else {
        echo "only jpg jpeg png allowed";
        exit();
    }


}