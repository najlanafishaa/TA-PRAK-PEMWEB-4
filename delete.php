<?php
session_start();
require "session.php";
cek_login();

$id = $_GET["id"] ?? null;

if ($id !== null && isset($_SESSION["kontak"][$id])) {
    unset($_SESSION["kontak"][$id]);
}

header("Location: index.php");
exit;
?>
