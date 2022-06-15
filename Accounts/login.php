<?php

    $db = new mysqli ('localhost', 'root', '', 'esrep');

    if (mysqli_connect_errno()){
        die ('Connection failed');
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $myusername = mysqli_real_escape_string($db, $_POST['mail']);
        $mypassword = mysqli_real_escape_string($db, $_POST['password']);
        $date = time();

        $sql = "SELECT id FROM users WHERE mail = '$myusername' and psswd = '$mypassword'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);

        if($count == 1){
            //mysqli_query($db, "UPDATE users SET logged = '{$date}' WHERE ID = '{$result}'");

            header('Location: ../Home/home.php');
            exit;
        }
        else{
            echo "username or password not valid"; //to make a pop up
        }
    }

?>
