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
    <script src="script.js"></script>
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
            <a href="resources.php">Resources</a>
            <ul>
                <li><a href="food.php">Food</a></li>
                <li><a href="medicine.php">Medicine</a></li>
                <li><a id="focus" href="fuel.php">Fuel</a></li>
                <li><a href="makeup.php">Make Up</a></li>
                <li><a href="office.php">Office Suplies</a></li>
                <li><a href="tools.php">Tools</a></li>
            </ul>
            <a href="../Maintenance/maintenance.php">Maintenance</a>
            <ul>
                <li><a href="../Maintenance/spare.php">Spare Parts</a></li>
                <li><a href="../Maintenance/insurance.php">Insurance</a></li>
                <li><a href="../Maintenance/check.php">Check Up</a></li>
            </ul>
        </div>
        <div class="right">
            <h3>Make Up</h3>
            <form method="post">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Supply Date</th>
                        <th>Notice Date</th>
                        <th>Options</th>
                    </tr>
                    <?php
                    require_once "../includes/functions.php";
                    createTable("make-up");
                    ?>
                </table>
            </form>
            <div class="after-table">
                <form method="post">
                    <label for="new-row-icon">Insert a new row</label>
                    <input type="image" src="../query_icons/new_icon.png" name="new" class="button" width="10% !important" id="new-row-icon">
                </form>
            </div>
            <?php
            if(canInsert())
            insertNewRow($_SESSION["connection"], 'make-up', $_POST["newName"], $_POST["newQuantity"], $_POST["newUnit"], $_POST["newSupply"], $_POST["newNotice"]);

            if (canUpdate()) {
                foreach ($_POST as $postItem => $e) {
                    if (strpos($postItem, "updateRow") !== false) {
                        $itemId = str_replace("updateRow", "", $postItem);
                        $itemId = str_replace("_x", "", $itemId);
                        
                        updateRow($_SESSION["connection"], $itemId, 'make-up', $_POST["updateName"], $_POST["updateQuantity"], $_POST["updateUnit"], $_POST["updateSupplyDate"], $_POST["updateNoticeDate"]);
                        break;
                    }
                }
            }
            ?>
        </div>
    </main>
</body>

</html>