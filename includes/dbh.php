<?php

$serverName = "eu-cdbr-west-02.cleardb.net";
$dBUsername = "bffe8797c22a8e";
$dBPassword = "1421205b";
$dBName = "heroku_77cead369fea437";


if (!session_id())
    session_start();
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
$_SESSION["connection"] = $conn;
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());

}