<?php
header("Content-Type: application/json");
if ($_POST['loaded'] == "") {
    header("HTTP/1.1 403 Forbidden");
    echo "<h1>403 Forbidden</h1>";
    echo "Navigation to this page is not allowed.";
    exit;
}
include_once("../includes/db_connect.php");
// Check connection
if (!$connection) {
    session_write_close();
    die(mysqli_connect_error());
}
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
for ($y = $x; $y < 8; $y++) {
    $image[$y] = addslashes("images/default_image.png");
}
$json = json_encode($image);
if ($json === false) {
    // Avoid echo of empty string (which is invalid JSON), and
    // JSONify the error message instead:
    $json = json_encode(array("jsonError", json_last_error_msg()));
    if ($json === false) {
        // This should not happen, but we go all the way now:
        $json = '{"jsonError": "unknown"}';
    }
    // Set HTTP response status code to: 500 - Internal Server Error
    http_response_code(500);
}
echo $json;
mysqli_close($connection);
