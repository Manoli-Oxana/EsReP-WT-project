<?php

if(isset($_POST["submit"])){
    $myemail = $_POST["mail"];
    $mypassword = $_POST["password"];
    $mypassword2 = $_POST["password2"];
    
    require_once 'dbh.php';
    require_once 'functions.php';

    if (pwdMatch($mypassword, $mypassword2) !== false){
        header("location:  ../Accounts/register.php?error=passwordsdontmatch");
        exit();
    }

    if (emailExists($conn, $myemail) !== false){
        header("location:  ../Accounts/register.php?error=emailtaken");
        exit();
    }

    createUser($conn, $myemail, $mypassword);

}
else {
    header("location:  ../Accounts/register.php");
    exit();
}
