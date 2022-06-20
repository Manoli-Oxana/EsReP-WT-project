<?php
    require_once '../includes/functions.php';
    if(!session_id()){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../responsive.css">
    <title>EsReP</title>
</head>
<body>
    <header>
        <a href="../Home/home.php"><img src="../EsReP.png"></a>
        <nav>
        <?php
        if(isset($_SESSION["id"])){
            showNav();
        }
        else{
            header('location: ../index.php');
            }
             ?>
        </nav>
    </header>

    <main>
        <div class="leftmenu">
            <a href="../Resources/resources.php">Resources</a>
            <ul>
                <li><a href="../Resources/food.php">Food</a></li>
                <li><a href="../Resources/medicine.php">Medicine</a></li>
                <li><a href="../Resources/fuel.php">Fuel</a></li>
                <li><a href="../Resources/makeup.php">Make Up</a></li>
                <li><a href="../Resources/officesupplies.php">Office Suplies</a></li>
                <li><a href="../Resources/tools.php">Tools</a></li>
            </ul>
            <a href="../Maintenance/maintenance.php">Maintenance</a>
            <ul>
                <li><a href="../Maintenance/spare.php">Spare Parts</a></li>
                <li><a href="../Maintenance/insurance.php">Insurance</a></li>
                <li><a href="../Maintenance/check.php">Check Up</a></li>
            </ul>
        </div>
        <div class="right">
            <form method="post" action="../includes/export.inc.php" name="export" >
            <button  class="button" type="submit" name="exportCsv">CSV Export</button>
            <button  class="button" type="submit" name="exportJson">JSON Export</button>
            <button  class="button" type="submit" name="exportXml">XML Export</button>
            <?php
            if(isset($_GET["error"])){
            if($_GET["error"] == "problemexporting"){
                echo "<p>Problem exporting your data!</p> ";
                    }    
                }         
            ?>
        </form>
            <button>Download Statistics</button>
        </div>
    <main>
</body>
</html>