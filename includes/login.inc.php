<?php

if(isset($_POST["submit"])) {

    $myemail = $_POST["mail"];
    $mypassword = $_POST["password"];

    require_once 'dbh.php';
    require_once 'functions.php';

    loginUser($conn, $myemail, $mypassword);
}
else {
    header("location:  ../Accounts/login.php");
    exit();
}