<?php

require_once 'dbh.php';
$id = $_SESSION["id"];

$query = "SELECT max(product_id) from all_stuff where user_id='$id';";
$queryIndex = mysqli_query($conn, $query) ;
$rowData = mysqli_fetch_assoc($queryIndex);
$index= $rowData["max(product_id)"] + 1;


if(isset($_POST["import"])){
    

    $fileName = $_FILES["file"]["tmp_name"];
    $fileType = $_FILES["file"]["type"];
    
    $succes = 0;
    //import csv
    if($_FILES["file"]["size"] >0 && $fileType == 'text/csv' ){
        $file = fopen($fileName,"r");
    

        while(($column = fgetcsv($file, 10000, ",")) !== FALSE){
            $queryCsv = "INSERT INTO all_stuff (user_id, product_id, name, quantity, unit, type, supply, notice) 
            VALUES ('$id', '". $index . "', '" . $column[0] . "', '" . $column[1] . "', '" . $column[2] . "', '" . $column[3] . "', '" . $column[4] . "', '"  . $column[5] . "');";
            $index +=1;

            $result = mysqli_query($conn, $queryCsv);

            if(!empty($result)){
                $succes = 1;
            }
           
        }
    }
    //import json
     if($_FILES["file"]["size"] >0 && $fileType == 'application/json'){
        $data = file_get_contents($fileName);

        $array = json_decode($data);


        foreach($array as $value){
            $queryJson = "INSERT INTO all_stuff (user_id, product_id, name, quantity, unit, type, supply, notice) 
            VALUES ('$id', '". $index . "', '" . $value->name . "', '" . $value->quantity . "', '" . $value->unit . "', '" . $value->type . "', '" . $value->supply . "', '"  . $value->notice . "');";
            $index +=1;

            $result = mysqli_query($conn, $queryJson);

            if(!empty($result)){
                 $succes = 1;
            }
        }
    }
    //import xml
    if ($_FILES["file"]["size"] >0 && $fileType == 'text/xml'){
       $xml = simplexml_load_file($fileName);

       foreach($xml->stock as $value ){
        $queryXml ="INSERT INTO all_stuff (user_id, product_id, name, quantity, unit, type, supply, notice) 
        VALUES ('$id', '". $index . "', '" . $value->name . "', '" . $value->quantity . "', '" . $value->unit . "', '" . $value->type . "', '" . $value->supply . "', '"  . $value->notice . "');";
        $index +=1;

        $result = mysqli_query($conn, $queryXml);

        if(!empty($result)){
             $succes = 1;
        }
       }
    }
    if($succes == 1){
        header("location:  ../features/import.php?error=none");
    }
    else
        header("location:  ../features/import.php?error=problemimporting");

} 