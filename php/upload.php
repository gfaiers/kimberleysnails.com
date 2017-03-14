<?php
$target_dir = $_POST["dir"];
$upload_name = $_POST["upload_name"];
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$error_message = "";
// Check if image file is a actual image or fake image
if ($target_dir == "") {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>403 Forbidden</h1>";
    echo "Navigation to this page is not allowed.";
    exit;
}
$check = getimagesize($_FILES["file"]["tmp_name"]);
if($check !== false) {
    $error_message = "AFile is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    $error_message = "BFile is not an image.";
    $uploadOk = 0;
}
// Check if file already exists
if ($upload_name == "_work_done") {
    if (file_exists($target_file)) {
        $error_message = "BFile already exists.";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["file"]["size"] > 5000000) { // in bytes 1000 = 1kb 1,000,000 = 1mb
    $error_message = "BFile is too large: " . $_FILES["file"]["size"];
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error_message = "BOnly JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "$error_message \n\nYour file was not uploaded.";
// if everything is ok, try to upload file
} else {
    // work with upload_name, check what to do with the file, if it needs renaming etc.
    if ($upload_name !== "_work_done") {
        if ($upload_name == "_clients_bg") {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . "bg" . $imageFileType)) {
                echo "AThe file ". basename( $_FILES["file"]["name"]). " has been uploaded as a new clients background.";
            } else {
                echo "CError: " . $_FILES['file']['error'];
            }
        } else if ($upload_name == "_header_bg") {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . "header." . $imageFileType)) {
                echo "AThe file ". basename( $_FILES["file"]["name"]). " has been uploaded as a new header background.";
            } else {
                echo "CError: " . $_FILES['file']['error'];
            }
        }
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "AThe file ". basename( $_FILES["file"]["name"]). " has been uploaded and added to the gallery of work done.";
            include_once("../includes/db_connect.php");
            if (!$connection) {
                session_write_close();
                die(mysqli_connect_error());
            }
            $sql_new_image = "INSERT INTO clients (image) VALUES ('" . substr($target_file, 3) . "')";
            if (!mysqli_query($connection, $sql_new_image)) {
                die("B".mysqli_error($connection));
            }
        } else {
            echo "CError: " . $_FILES['file']['error'];
        }
    }
}