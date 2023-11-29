<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
?>