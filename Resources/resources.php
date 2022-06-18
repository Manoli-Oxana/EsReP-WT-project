<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>EsReP</title>
</head>

<body>
    <header>
        <a href="../Home/home.php"><img src="../EsReP.png"></a>
        <nav>
            <a href="../Home/home.php">Home</a>
            <a href="../features/import.php">Import</a>
            <a href="../features/export.php">Export</a>
            <a href="../Home/cabinet.php">My Cabinet</a>
        </nav>
    </header>

    <main>
        <div class="leftmenu">
            <a id="focus" href="resources.php">Resources</a>
            <ul>
                <li><a href="food.php">Food</a></li>
                <li><a href="medicine.php">Medicine</a></li>
                <li><a href="fuel.php">Fuel</a></li>
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
            <h3>Resources</h3>

            <form method="post">
                <table>
                    <tr>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Supply Date</th>
                        <th>Notice Date</th>
                        <th>Options</th>
                    </tr>
                    <?php
                    require_once "../includes/functions.php";
                    createTable();
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
            var_dump($_POST);
            if (canInsert()) {
                insertNewRow($_SESSION["connection"], $_POST["newType"], $_POST["newName"], $_POST["newQuantity"], $_POST["newUnit"], $_POST["newSupply"], $_POST["newNotice"]);
            }
            if (canUpdate()) {
                foreach ($_POST as $postItem => $e) {
                    if (strpos($postItem, "updateRow") !== false) {
                        $itemId = str_replace("updateRow", "", $postItem);
                        $itemId = str_replace("_x", "", $itemId);
                        var_dump($itemId);
                        updateRow($_SESSION["connection"], $itemId, $_POST["updateType"], $_POST["updateName"], $_POST["updateQuantity"], $_POST["updateUnit"], $_POST["updateSupplyDate"], $_POST["updateNoticeDate"]);
                        break;
                    }
                }
            }
            ?>
        </div>
        </div>
</body>

</html>
