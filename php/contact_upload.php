<?php
// format the email address
$email = addslashes(strtolower($_POST['email']));
// tel is already formatted correctly
$tel = addslashes($_POST['tel']);
$facebook = addslashes($_POST['facebook']);
$instagram = addslashes($_POST['instagram']);
$twitter = addslashes($_POST['twitter']);
if ($email == ''){
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>403 Forbidden</h1>";
    echo "Navigation to this page is not allowed.";
    exit;
}
include_once("../includes/db_connect.php");
// Check connection
if (!$connection) {
    mysqli_close($connection);
    die("C" . mysqli_connect_error());
}
$sql = "INSERT INTO contact (tel, email, facebook, instagram, twitter) VALUES ('$tel', '$email', '$facebook', '$instagram', '$twitter')";
if (mysqli_query($connection, $sql)) {
    echo("AUpdated.");
} else {
    echo("C" . mysqli_error($connection));
}