<?php

if(isset($_POST["submit"])) {

    $oldPwd = $_POST["old-pwd"];
    $password1 = $_POST["password"];
    $password2 = $_POST["password2"];

    require_once 'dbh.php';
    require_once 'functions.php';

    changePwd($conn, $oldPwd, $password1, $password2);
}
else {
    header("location:  ../Home/cabinet.php");
    exit();
}