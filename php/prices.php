<?php
$title = addslashes($_POST['title']);
$message = addslashes($_POST['message']);
$hand_tp = addslashes(strtoupper($_POST['hand_tp']));
$hand_shel = addslashes(strtoupper($_POST['hand_shel']));
$hand_ac = addslashes(strtoupper($_POST['hand_ac']));
$hand_art = addslashes(strtoupper($_POST['hand_art']));
$feet_tp = addslashes(strtoupper($_POST['feet_tp']));
$feet_shel = addslashes(strtoupper($_POST['feet_shel']));
$feet_ac = addslashes(strtoupper($_POST['feet_ac']));
$feet_art = addslashes(strtoupper($_POST['feet_art']));
if ($title == ''){
    session_write_close();
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
$sql = "INSERT INTO prices (hand_tp, hand_shel, hand_ac, hand_art, feet_tp, feet_shel, feet_ac, feet_art, title, message) VALUES ('$hand_tp', '$hand_shel', '$hand_ac', '$hand_art', '$feet_tp', '$feet_shel', '$feet_ac', '$feet_art', '$title', '$message')";
if (mysqli_query($connection, $sql)) {
    echo("AUpdated.");
} else {
    echo("C" . mysqli_error($connection));
}