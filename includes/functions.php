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

function changePwd($conn, $oldPwd, $password1, $password2){
   
    require_once 'dbh.php';
    $id = $_SESSION["id"];

    $sql = "SELECT psswd FROM users WHERE id= '$id';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1)
        $row = mysqli_fetch_assoc($result);
    $checkPwd = password_verify($oldPwd, $row["psswd"]);

    if($checkPwd === false){
        header("location:  ../Home/cabinet.php?error=wrongOldPass");
        exit();
    }
    else if(pwdMatch($password1,$password2) !== false ){
        header("location:  ../Home/cabinet.php?error=passdontmatch");
        exit();
    } else if ($checkPwd === true){
        $sql = "UPDATE users SET psswd = (?) WHERE id= '$id';";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location:  ../Home/cabinet.php?error=updatefailed");
            exit();
        }
    
        $hashedPwd = password_hash($password1, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "s", $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Home/cabinet.php?error=none");
    exit();
    }
}

function getuserbyid($conn, $id)
{
    $sql = "SELECT * FROM users WHERE id ='$id'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row;
    }
    return null;
}
function getresources($conn)
{
    require_once 'dbh.php';
    $id = $_SESSION["id"];

    $sql = "SELECT * FROM all_stuff WHERE (type='food' or type='fuel' or type='medicine' or type='make-up' or type='office_supplies' or type='tools') and id ='$id'";
    $output = [];
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        array_push($output, $row);
    }
    return $output;
}


function getmaintanance($conn)
{
    require_once 'dbh.php';
    $id = $_SESSION["id"];

    $sql = "SELECT * FROM all_stuff WHERE type='spare-parts' or type='insurance' or type='check-up' and id='$id' ";
    $output = [];
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        array_push($output, $row);
    }
    return $output;
}

function getresourcesbytype($conn, $type)
{
    require_once 'dbh.php';
    $id = $_SESSION["id"];
    
    $sql = "SELECT * FROM all_stuff WHERE type='$type' and id='$id' ";
    $output = [];
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        array_push($output, $row);
    }
    var_dump($sql);
    return $output;
    
}

function deleteResourceById($conn, $id)
{
    $sql = "DELETE FROM all_stuff  WHERE id='$id'" ;
    $conn->query($sql);
}
function canInsert()
{
    $values = ["newType", "newName", "newQuantity", "newUnit", "newSupply", "newNotice"];
    foreach ($values as $value) {
        if (!isset($_POST[$value])) {
            return false;
        }
    }
    return true;
}
function canUpdate()
{
    $values = ["updateType", "updateName", "updateQuantity", "updateUnit", "updateSupplyDate", "updateNoticeDate"];
    foreach ($values as $value) {
        if (!isset($_POST[$value])) {
            echo $value;
            return false;
        }
    }
    return true;
}
function insertNewRow($conn, $type, $name, $quantity, $unit, $supply, $notice)
{   require_once "dbh.php";
    $id=$_SESSION["id"];

    $sql = $conn->prepare("INSERT INTO all_stuff (id, type, name, quantity, supply, notice, unit) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("sssssss", $id, $type, $name, $quantity, $supply, $notice, $unit);
    $sql->execute();
}


function updateRow($conn, $itemId, $type, $name, $quantity, $unit, $supply, $notice)
{
    $sql = $conn->prepare("UPDATE all_stuff SET type=?, name=?, quantity=?, supply=?, notice=?, unit=? WHERE id=?");
    $sql->bind_param("sssssss", $type, $name, $quantity, $supply, $notice, $unit, $itemId);
    $sql->execute();
}

function getRowIndexById($conn, $id, $isResource)
{
    $conn->query("SET @row_num=0");
    if ($isResource) {
        $sql = "SELECT * FROM (SELECT (@row_num:=@row_num + 1) AS num, id FROM all_stuff WHERE type !='spare-parts' and type!='insurance' and type!='check-up' and type!='maintenance' ORDER BY id) AS inner_table WHERE inner_table.id='$id'" ;
    } else {
        $sql = "SELECT * FROM (SELECT (@row_num:=@row_num + 1) AS num, id FROM all_stuff WHERE type ='spare-parts' or type='insurance' or type='check-up' or type='maintenance' ORDER BY id) AS inner_table WHERE inner_table.id='$id'" ;
    }
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        return $row;
    }
    return null;
}

function createTable($resourceType = false, $isMaintenance = false)
{
    require_once "dbh.php";
    
    $userdata = getuserbyid($_SESSION["connection"], $_SESSION["id"]);
    if (!$resourceType) {
        if (!$isMaintenance) {
            $resources = getresources($_SESSION["connection"]);
        } else {
            $resources = getmaintanance($_SESSION["connection"]);
        }
    } else {
        if ($isMaintenance) {
            $resources = getmaintanance($_SESSION["connection"]);
        } else {
            $resources = getresourcesbytype($_SESSION["connection"], $resourceType);
        }
    }
    
    foreach ($resources as $resource) {
        echo "<tr>";
        if (!$resourceType) {
            echo "<td>" . $resource["type"] . "</td>";
        }
        echo "<td>" . $resource["name"] . "</td>";
        echo "<td>" . $resource["quantity"] . "</td>";
        echo "<td>" . $resource["unit"] . "</td>";
        echo "<td>" . $resource["supply"] . "</td>";
        echo "<td>" . $resource["notice"] . "</td>";
        echo "<td>";

        echo '<form method="post">';
        echo '<input type="image" src="../query_icons/delete_icon.png" name="delete' . $resource["id"] . '" class="button" width="5% !important" />';
        echo '<input type="image" src="../query_icons/edit_icon.png" name="edit' . $resource["id"] . '" class="button" width="5% !important" />';

        echo "</form>";

        echo "</td>";
        echo "</tr>";
    }
    foreach ($_POST as $postItem => $e) {
        if (strpos($postItem, "delete") !== false) {
            $itemId = str_replace("delete", "", $postItem);
            $itemId = str_replace("_x", "", $itemId);
            deleteResourceById($_SESSION["connection"], $itemId);
            break;
        } else if (strpos($postItem, "edit") !== false) {
            $itemId = str_replace("edit", "", $postItem);
            $itemId = str_replace("_x", "", $itemId);
            $rowIndex = getRowIndexById($_SESSION["connection"],  $itemId, true);

            echo '<script>alterRowById(' . $itemId . ', ' . $rowIndex["num"] . ')</script>';
            break;
        } else if (strpos($postItem, "new") !== false) {
            if (!$resourceType) {
                echo '<td><input type="text" name="newType" required/></td>';
            }
            echo '<td><input type="text" name="newName" required/></td>';
            echo '<td><input type="number" name="newQuantity" required/></td>';
            echo '<td><input type="text" name="newUnit" required/></td>';
            echo '<td><input type="date" name="newSupply" required/></td>';
            echo '<td><input type="date" name="newNotice" required/></td>';
            echo '<td><input type="submit" name="submitNewRow"/></td>';
            break;
        }
    }
}
function notice($id){
    session_name("");
    require_once 'dbh.php';

    $query_notice_check = "SELECT name FROM all_stuff WHERE id='$id' AND notice <= CURRENT_DATE;";
    $result = mysqli_query($conn, $query_notice_check);
    $count = mysqli_num_rows($result);
    $list = ""; $email="";

    if($count == 0){
        exit();
    }
    else {
        while($rowData = mysqli_fetch_assoc($result)){
            $list .= $rowData["name"].', ';
        };

        $name = "list";
        setcookie($name, $list);

        echo '<script type="text/JavaScript"> 
        let x = document.cookie;
        x = encodeURIComponent(x);
        c = x.replace("list", "").replace(/%3D/g, "").replace(/%252C/g, ",").replace(/%2520/g, " ").replace("%3B%20PHPSESSID47639he2tog0lemc86uemg8lq5", "");
        x = "Check on "
        message = x.concat(c);
        
        window.onload = function(){ alert(message);} 
        </script>';

        $fetch = mysqli_query($conn, "SELECT mail FROM users WHERE id = '$id'");
        $rowData = mysqli_fetch_array($fetch, MYSQLI_ASSOC);
        $email .= $rowData["mail"];

        $result = @mail($email, "ESREP Notice", "It's time to check on $list");
        exit();
    }
}