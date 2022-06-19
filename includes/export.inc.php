<?php

require_once 'dbh.php';
$id = $_SESSION["id"];

$query = "SELECT name, quantity, unit, type, supply, notice FROM all_stuff WHERE user_id='$id';";
$result = mysqli_query($conn, $query);


if(isset($_POST["exportCsv"])){
    $succes = 0;
    $delimiter = ",";
        $filename = "supplies-data_" . date('Y-m-d') . ".csv";

        //create a file pointer
        $f = fopen('php://memory', 'w');

    if(mysqli_num_rows($result)>0){
    
        $fields = array('Name', 'Quantity', 'Unit', 'Type', 'Supply', 'Notice');
        fputcsv($f, $fields, $delimiter);

        while($row = mysqli_fetch_assoc($result)){
            $lineData = array($row['name'], $row['quantity'], $row['unit'], $row['type'], $row['supply'], $row['notice'] );
            fputcsv($f, $lineData, $delimiter);
        }
        $succes =1;
    }


    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file
    header('Content-Type: text/csv; chartset=utf-8');
    header('Content-Transfer-Encoding: Binary');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}
else if(isset($_POST["exportJson"])){
    $succes = 0;
   
    $filename = "supplies-data_" . date('Y-m-d') . ".json";
    $f = fopen('php://memory', 'w');

    $json_array = array();

    while($row = mysqli_fetch_assoc($result)){
        
        $json_array[] = $row;

    }
    if(!empty($result)){
    
   }
    fwrite($f, json_encode($json_array));
    fseek($f, 0);

    //set headers to download file
    header('Content-Type:application/json; chartset=utf-8');
    header('Content-Transfer-Encoding: Binary');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);

    
}
else if(isset($_POST["exportXml"])){
    $succes = 0;

    $filename = "supplies-data_" . date('Y-m-d') . ".xml";
    $f = fopen('php://memory', 'w');

    $xml = new XMLWriter();
    $xml->openUri("php://output");
    $xml->startDocument('1.0', 'UTF-8');
    $xml->setIndent(true);
    $xml->startElement('supplies');

    while($row = mysqli_fetch_assoc($result)){
        $xml->startElement('stock');
            $xml->startElement('name');
            $xml->writeRaw($row['name']);
            $xml->endElement();

            $xml->startElement('quantity');
            $xml->writeRaw($row['quantity']);
            $xml->endElement();

            $xml->startElement('unit');
            $xml->writeRaw($row['unit']);
            $xml->endElement();

            $xml->startElement('type');
            $xml->writeRaw($row['type']);
            $xml->endElement();

            $xml->startElement('supply');
            $xml->writeRaw($row['supply']);
            $xml->endElement();

            $xml->startElement('notice');
            $xml->writeRaw($row['notice']);
            $xml->endElement();
        $xml->endElement();    
    }
    $xml->endElement();

    header('Content-type: text/xml');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    $xml->flush();

}

