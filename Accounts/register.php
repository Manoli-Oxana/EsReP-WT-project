<?php

    $db = new mysqli ('localhost', 'root', '', 'esrep');

    if (mysqli_connect_errno()){
        die ('Connection failed');
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $myusername = mysqli_real_escape_string($db, $_POST['mail']);
        $mypassword = mysqli_real_escape_string($db, $_POST['password']);
        $mypasswrodcheck = mysqli_real_escape_string($db, $_POST['password2']);

        if ($myusername != "" && $mypassword != "" && $mypasswrodcheck !=""){
            if($mypassword === $mypasswrodcheck){
                if (strlen($mypassword) >= 5 && strpbrk($mypassword, "#1234567890") != false){
                    $query = mysqli_query($db, "SELECT * FROM users where mail = '{$myusername}'");
                    if (mysqli_num_rows($query)==0){
                        $id='';

                        $date=time();

                        mysqli_query($db, "INSERT INTO users VALUES ( '{$id}', '{$myusername}', '{$mypassword}', '{$date}', '{$date}')");

                        $query = mysqli_query($db, "SELECT * FROM users WHERE mail='{$myusername}'");
                        if (mysqli_num_rows($query)==1){

                            header('Location: ../Home/home.html');
                            exit;
                        }
                        else
                            echo 'An error occurred and your account was not created. Please try again.';
                    }
                    else
                        echo 'This email already has an user attached to it. Please log in, or use another email.';
                }
                else
                    echo 'Your password is not strong enough. Please use another';
            }
            else
                echo 'Your passwords did not match.';
        }
        else
            echo 'Please fill out all required fields.';

    }

?>