<?php
$header_title = addslashes($_POST['header_title']);
$header_second = addslashes($_POST['header_second']);
$introduction_title = addslashes($_POST['introduction_title']);
$gallery_title = addslashes($_POST['gallery_title']);
$contact_title = addslashes($_POST['contact_title']);
$introduction_content = addslashes($_POST['introduction_content']);
$contact_content = addslashes($_POST['contact_content']);
if ($header_title == ''){
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
$sql = "INSERT INTO titles (header_title, header_second_line, introduction_section_title, gallery_section_title, contact_section_title) VALUES ('$header_title', '$header_second', '$introduction_title', '$gallery_title', '$contact_title')";
$sql_content = "INSERT INTO content (introduction, contact) VALUES ('$introduction_content', '$contact_content')";
if (mysqli_query($connection, $sql)) {
    if (mysqli_query($connection, $sql_content)) {
        echo("AUpdated.");
    } else {
        echo("C" . mysqli_error($connection));
    }
} else {
    echo("C" . mysqli_error($connection));
}