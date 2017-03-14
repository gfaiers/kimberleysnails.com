<?php
session_start();
setcookie(session_name(), '', 100);
session_unset();
if (session_destroy() == true) {
    $_SESSION = array();
    echo("A");
} else {
    $_SESSION = array();
    echo("B");
}