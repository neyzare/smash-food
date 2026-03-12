<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['user_id'])) {
    session_destroy();
    header("location: /index.php");
    exit();
}
