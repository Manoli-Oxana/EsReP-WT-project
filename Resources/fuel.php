<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            <h3>Fuel</h3>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Suply Date</th>
                    <th>Notice Date</th>
                </tr>
                <tr>
                    <td>Benzina</td>
                    <td>150l</td>
                    <td>01.02.2022</td>
                    <td>01.03.2022</td>
                </tr>
                <tr>
                    <td>Motorina</td>
                    <td>100l</td>
                    <td>01.02.2022</td>
                    <td>01.03.2022</td>
                </tr>
            </table>
        </div>
    </main>
</body>
</html>
