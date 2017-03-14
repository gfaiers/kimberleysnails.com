<?php
include_once("../includes/sessions.php");
$email = strtolower($_POST['email']); // needs to be encrypted
if ($email == '') {
    session_write_close();
    header("HTTP/1.1 401 Unauthorized");
    echo "<h1>401 Unauthorized</h1>";
    echo "You need to be logged in to view this page.";
    exit;
}
// the user has got to the page correctly, now open the database connection
include_once("../includes/db_connect.php");
// Check connection
if (!$connection) {
    session_write_close();
    die('B' . mysqli_connect_error());
}
include_once("../includes/functions.php");
include_once("../includes/security.php");
$password = $_POST['password']; // needs to be hashed
$sql_key = "SELECT * FROM credentials";
$check = mysqli_query($connection, $sql_key) or die("B".mysqli_error($connection));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    while ($row_key = mysqli_fetch_assoc($check)) {
        $encryption_key = $row_key["enc_key"];
    }
} else {
    // no key saved, generate one
    $encryption_key = bin2hex(openssl_random_pseudo_bytes(32));
    $sql_key_save = "INSERT INTO credentials (enc_key) VALUES ('".$encryption_key."')";
    if (!mysqli_query($connection, $sql_key_save)) {
        die("B".mysqli_error($connection));
    }
}
$secret_iv = 'thisis===16bytes';

// encrypt the email address to check 
$enc_email = openssl_encrypt(
    pkcs7_pad($email, 16),  // padded data
    'AES-256-CBC',          // cipher and mode
    $encryption_key,        // secret key
    0,                      // options (not used)
    $secret_iv              // initialisation vector (for set value)
);

$sql_login_attempts_read = "SELECT * FROM login_attempts WHERE id = '$enc_email'";
$check = mysqli_query($connection, $sql_login_attempts_read) or die("B".mysqli_error($connection));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    // this should only run through once, as only one email will be found
    while($row_login_attempts = mysqli_fetch_assoc($check)) {
        // read the correct values
        $time = $row_login_attempts["time"]; // this is the time of the last failed login attempt
        $count = $row_login_attempts["count"]; // this is the number of failed login attempts for the account
        $locked = $row_login_attempts["locked"]; // this is the value for if the user is locked out or not
    }
} else {
    // If the user doesn't appear in the login_attempts table, 
    // then this needs to check if there are any users registered to the site, if there are then warn incorrect details
    // if there isn't then register
    $sql_count_users = "SELECT * FROM users";
    $check = mysqli_query($connection, $sql_count_users) or die("B" . mysqli_error($connection));
    $check2 = mysqli_num_rows($check);
    if ($check2 != 0) {
        session_write_close();
        mysqli_close($connection);
        die('C'.$email.' is not registered.');
    } else {
        // there are no registered users, register the user
        // hash the password
        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        $time = null;
        $count = 0;
        $locked = 0;
        // save to database
        $sql_users= "INSERT INTO users (username, password) VALUES ('".$enc_email."', '".$hash."')";
        $sql_users_insert = "INSERT INTO login_attempts (id, time, count, locked) VALUES ('".$enc_email."', '".$time."', '".$count."', '".$locked."')";
        if (mysqli_query($connection, $sql_users)) { // save to the users table
            if (mysqli_query($connection, $sql_users_insert)) { // save to the login_attempts table
                // account varified
                mysqli_close($connection);
                // request user login again
                die("CPlease now login with the credentials you just supplied.");
            } else {
                mysqli_close($connection);
                die("B" . $sql . '<br/>' . mysqli_error($connection));
            }
        } else {
            mysqli_close($connection);
            die("B" . $sql . '<br/>' . mysqli_error($connection));
        }
    }
}
if ($locked == 1) { // 0 is unlocked
    session_write_close();
    mysqli_close($connection);
    die('C'.$email.' is locked out.');
}
$sql_users_read = "SELECT * FROM users WHERE username = '$enc_email'";
$check = mysqli_query($connection, $sql_users_read) or die("B" . mysqli_error($connection));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    // output data of each row
    // this should only run through once, as only one email will be found
    while($row_users = mysqli_fetch_assoc($check)) {
        if (password_verify($password, $row_users["password"])) { // varify the password entered is correct
            // reset the count on login_attempts
            // LOGIN COMPLETE
            $count = 0;
            $time = null;
            $locked = 0;
            $_SESSION['user_id'] = $enc_email;
        } else {
            // this needs to iterate the count in the database for the user
            $count++;
            $time = date("Y-m-d H:i:s");
            if ($count == 5) {
                $locked = 1;
                $subject = "KimberleysNails.com account locked";
                $message = "Your account for kimberleysnails.com has been locked. Please click this link to unlock the account and set a new password.";
                $headers = "From: noreply@kimberleysnails.com";
                mail($email,$subject,$message,$headers);
                session_write_close();
                mysqli_close($connection);
                die("CDue to too many concecuative failed login attempts the account '.$email.' has now been locked out.  Please check the email account to reset the password and unlock the account.");
            } else {
                $locked = 0;
                session_write_close();
                mysqli_close($connection);
                die("CIncorrect Password.");
            }
        }
    }
}
// save to the login_attempts table
$sql_login_attempts_write = "UPDATE login_attempts SET time='".$time."', count='".$count."', locked='".$locked."' WHERE id='".$enc_email."'";
if (mysqli_query($connection, $sql_login_attempts_write)) {
    echo("A");
} else {
    echo("B" . mysqli_error($connection));
}
session_write_close();
mysqli_close($connection);