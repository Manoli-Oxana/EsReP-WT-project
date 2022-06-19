<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "esrep";

if (!session_id())
    session_start();
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
$_SESSION["connection"] = $conn;

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
