<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>EsReP</title>
  </head>
  <body>
    <header>
      <a href="../Home/home.php"><img src="../EsReP.png" /></a>
      <nav>
        <a href="../Home/home.php">Home</a>
        <a href="../features/import.php">Import</a>
        <a href="../features/export.php">Export</a>
        <a href="../Home/cabinet.php">My Cabinet</a>
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
        <a href="maintenance.php">Maintenance</a>
        <ul>
          <li><a id="focus" href="spare.php">Spare Parts</a></li>
          <li><a href="insurance.php">Insurance</a></li>
          <li><a href="check.php">Check Up</a></li>
          <li><a href="appliances.php">Appliances</a></li>
        </ul>
      </div>
      <div class="right">
        <h3>Spare Parts</h3>
        <table>
          <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Suply Date</th>
            <th>Notice Date</th>
          </tr>
          <tr>
            <td>Vacuum cleaner bag</td>
            <td>3 buc.</td>
            <td>15.03.2022</td>
            <td>15.07.2022</td>
          </tr>
          <tr>
            <td>Spare part for Compressor</td>
            <td>1 buc.</td>
            <td>12.02.2022</td>
            <td>31.05.2022</td>
          </tr>
          <tr>
            <td>Heater Plate</td>
            <td>2 buc.</td>
            <td>02.01.2022</td>
            <td>31.05.2022</td>
          </tr>
          <tr>
            <td>Electronic Switch</td>
            <td>6 buc.</td>
            <td>25.03.2022</td>
            <td>25.05.2022</td>
          </tr>
          <tr>
            <td>Cable Clamp</td>
            <td>5 buc.</td>
            <td>20.04.2022</td>
            <td>18.07.2022</td>
          </tr>
        </table>
      </div>
    </main>
  </body>
</html>
