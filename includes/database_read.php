<?php
include_once("db_connect.php");
// Check connection
if (!$connection) {
    session_write_close();
    die(mysqli_connect_error());
}
// define the titles variables
$sql_titles = "SELECT * FROM titles ORDER BY id DESC LIMIT 1";
$check = mysqli_query($connection, $sql_titles) or die("B" . mysqli_error($connection));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    while ($row_titles = mysqli_fetch_assoc($check)) {
        define("HEADER_TITLE", stripslashes($row_titles['header_title']));
        define("HEADER_SECOND_LINE", stripslashes($row_titles['header_second_line']));
        define("INTRODUCTION_SECTION_TITLE", stripslashes($row_titles['introduction_section_title']));
        define("GALLERY_SECTION_TITLE", stripslashes($row_titles['gallery_section_title']));
        define("CONTACT_SECTION_TITLE", stripslashes($row_titles['contact_section_title']));
    }
}
// define the content variables
$sql_content = "SELECT * FROM content ORDER BY id DESC LIMIT 1";
$check = mysqli_query($connection, $sql_content) or die("B" . mysqli_error($connection));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    while ($row_content = mysqli_fetch_assoc($check)) {
        define("INTRODUCTION_CONTENT_BR", nl2br(stripslashes($row_content['introduction'])));
        define("INTRODUCTION_CONTENT_NL", stripslashes($row_content['introduction']));
        define("CONTACT_CONTENT_BR", nl2br(stripslashes($row_content['contact'])));
        define("CONTACT_CONTENT_NL", stripslashes($row_content['contact']));
    }
}
// define the contact variables
$sql_contact = "SELECT * FROM contact ORDER BY id DESC LIMIT 1";
$check = mysqli_query($connection, $sql_contact) or die("B" . mysqli_error($connection));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    while ($row_contact = mysqli_fetch_assoc($check)) {
        // make sure it gets the mobile number in the right format for editing
        $tel = stripslashes($row_contact['tel']);
        $first = substr($tel, 8, 4);
        $second = substr($tel, 13);
        $tel_stripped = "0" . $first . $second;
        define("FORMATTED_TEL", $tel);
        define("TEL", $tel_stripped);
        define("EMAIL", stripslashes($row_contact['email']));
        define("FACEBOOK", stripslashes($row_contact['facebook']));
        define("INSTAGRAM", stripslashes($row_contact['instagram']));
        define("TWITTER", stripslashes($row_contact['twitter']));
    }
}

// definte the clients images variables
$sql_clients = "SELECT * FROM clients ORDER BY id DESC"; // no limit so it loads all the work that's been done, if there is more than 8, then it'll scroll them on an infinite loop
$check = mysqli_query($connection, $sql_clients) or die("B" . mysqli_error($connection));
$check2 = mysqli_num_rows($check);
$x = 0;
if ($check2 != 0) {
    while ($row_clients = mysqli_fetch_assoc($check)) {
        $x++;
        $image[$x] = $row_clients['image'];
    }
}
for ($y = 1; $y <= $x; $y++) {
    define("IMAGE[$y]", $image[$y]);
}
for ($y = $x; $y <= 8; $y++) {
    define("IMAGE[$y]", "images/default_image.png");
}

// define the prices variables
$sql_prices = "SELECT * FROM prices ORDER BY id DESC LIMIT 1";
$check = mysqli_query($connection, $sql_prices) or die("B" . mysqli_error($connection));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    while ($row_prices = mysqli_fetch_assoc($check)) {
        // this needs to format the prices
        // and check for N/A
        define("HAND_TP", stripslashes($row_prices['hand_tp']));
        define("HAND_SHEL", stripslashes($row_prices['hand_shel']));
        define("HAND_AC", stripslashes($row_prices['hand_ac']));
        define("HAND_ART", stripslashes($row_prices['hand_art']));
        define("FEET_TP", stripslashes($row_prices['feet_tp']));
        define("FEET_SHEL", stripslashes($row_prices['feet_shel']));
        define("FEET_AC", stripslashes($row_prices['feet_ac']));
        define("FEET_ART", stripslashes($row_prices['feet_art']));
        define("TITLE", stripslashes($row_prices['title']));
        define("MESSAGE_NL", stripslashes($row_prices['message']));
        define("MESSAGE_BR", nl2br(stripslashes($row_prices['message'])));
    }
}