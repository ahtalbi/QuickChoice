<?php

session_start();

$conn = new mysqli("localhost", "root", "", "appdb");

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if (!isset($_SESSION['id'])) {
    header('location:../');
}

$id = $_SESSION['id'];
?>