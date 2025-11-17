<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function cek_login() {
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
}
?>
