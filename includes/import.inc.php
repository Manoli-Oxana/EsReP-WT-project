<?php

if(isset($_POST["import"])){
    session_start();
    $id = $_SESSION["id"];

    require_once 'dbh.php';

    $fileName = $_FILES["file"]["tmp_name"];
    $fileType = $_FILES["file"]["type"];
    
    $succes = 0;
    //import csv
    if($_FILES["file"]["size"] >0 && $fileType == 'text/csv' ){
        $file = fopen($fileName,"r");

        while(($column = fgetcsv($file, 10000, ",")) !== FALSE){
            $queryCsv = "INSERT INTO all_stuff (id, name, quantity, unit, type, supply, notice) 
            VALUES ('$id', '" . $column[0] . "', '" . $column[1] . "', '" . $column[2] . "', '" . $column[3] . "', '" . $column[4] . "', '"  . $column[5] . "');";

            $result = mysqli_query($conn, $queryCsv);

            if(!empty($result)){
                $succes = 1;
            }
           
        }
    }
    //import json
    else if($_FILES["file"]["size"] >0 && $fileType == 'application/json'){
        $data = file_get_contents($fileName);

        $array = json_decode($data);

        foreach($array as $value){
            var_dump($value);
            $queryJson = "INSERT INTO all_stuff (id, name, quantity, unit, type, supply, notice) 
            VALUES ('$id', '" . $value->name . "', '" . $value->quantity . "', '" . $value->unit . "', '" . $value->type . "', '" . $value->supply . "', '"  . $value->notice . "');";

            $result = mysqli_query($conn, $queryJson);

            if(!empty($result)){
                 $succes = 1;
            }
        }
    }
    //import xml
    else if ($_FILES["file"]["size"] >0 && $fileType == 'text/xml'){
       $xml = simplexml_load_file($fileName);
        
       foreach($xml->stock as $value ){
        $queryXml ="INSERT INTO all_stuff (id, name, quantity, unit, type, supply, notice) 
        VALUES ('$id', '" . $value->name . "', '" . $value->quantity . "', '" . $value->unit . "', '" . $value->type . "', '" . $value->supply . "', '"  . $value->notice . "');";
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