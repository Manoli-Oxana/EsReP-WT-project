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
          <li><a href="spare.php">Spare Parts</a></li>
          <li><a href="insurance.php">Insurance</a></li>
          <li><a id="focus" href="check.php">Check Up</a></li>
        </ul>
      </div>
      <div class="right">
        <h3>Check Up</h3>
        <table>
          <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Suply Date</th>
            <th>Notice Date</th>
          </tr>
            <td>Valve Check</td>
            <td>2 </td>
            <td>20.04.2022</td>
            <td>18.06.2022</td>
          </tr>
           </tr>
            <td>Motor Check</td>
            <td>2 </td>
            <td>21.05.2022</td>
            <td>18.10.2022</td>
          </tr>
           </tr>
            <td>Gas Pump Check</td>
            <td>1 </td>
            <td>26.04.2022</td>
            <td>10.08.2022</td>
          </tr> 
        </tr>
          <td>Tires Check</td>
          <td>4 </td>
          <td>28.04.2022</td>
          <td>15.11.2022</td>
        </tr>

        </table>
      </div>
    </main>
  </body>
</html>
