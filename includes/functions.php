<?php
 
function pwdMatch($mypassword, $mypassword2){
    $result;
    if ($mypassword !== $mypassword2) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $myemail){
    $sql = "SELECT * FROM users WHERE mail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location:  ../Accounts/register.php?error=emailtaken");
        exit;
    }

    mysqli_stmt_bind_param($stmt, "s", $myemail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $myemail, $mypassword){
    $sql = "INSERT INTO users (mail, psswd, created ) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location:  ../Accounts/register.php?error=registerfailed");
        exit();
    }

    $hashedPwd = password_hash($mypassword, PASSWORD_DEFAULT);
    $created = date("Y/m/d");

    mysqli_stmt_bind_param($stmt, "sss", $myemail, $hashedPwd, $created);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Accounts/register.php?error=none");
    exit();
}


function loginUser($conn, $myemail, $mypassword){
    $emailExists = emailExists($conn, $myemail);

    if($emailExists === false){
        header("location:  ../Accounts/login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $emailExists["psswd"];

    $checkPwd = password_verify($mypassword, $pwdHashed);

    if($checkPwd === false){
        header("location:  ../Accounts/login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        $sql = "UPDATE users SET logged = (?) WHERE mail = '$myemail';";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location:  ../Accounts/register.php?error=updatefailed");
            exit();
        }
    
        $logged = date("Y/m/d");
    
        mysqli_stmt_bind_param($stmt, "s", $logged);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    
       session_start();
       $_SESSION["id"] = $emailExists["ID"];
       header("location: ../index.php");
       exit();
       

    }
}