<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// User logged in → redirect to homepage
header("Location: index.php");
exit;
