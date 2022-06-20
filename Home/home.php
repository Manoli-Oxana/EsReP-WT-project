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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <title>EsReP</title>
</head>
<body>
    <header>
        <a href="home.php"><img src="../EsReP.png"></a>
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
            <h3>Statistics</h3> 
            <canvas id="myBarChart" style="width:100%;max-width:1000px"></canvas>
            <canvas id="myPieChart" style="width:100%;max-width:1000px"></canvas>


<?php
  require_once '../includes/functions.php';
  $month1= getNrOfSuppliesByMonth(1);
  $month2= getNrOfSuppliesByMonth(2);
  $month3= getNrOfSuppliesByMonth(3);
  $month4= getNrOfSuppliesByMonth(4);
  $month5= getNrOfSuppliesByMonth(5);
  $month6= getNrOfSuppliesByMonth(6);
  $month7= getNrOfSuppliesByMonth(7);
  $month8= getNrOfSuppliesByMonth(8);
  $month9= getNrOfSuppliesByMonth(9);
  $month10= getNrOfSuppliesByMonth(10);
  $month11= getNrOfSuppliesByMonth(11);
  $month12= getNrOfSuppliesByMonth(12);
  $food = getNrOfSuppliesByType("food");
  $fuel = getNrOfSuppliesByType("fuel");
  $makeUp = getNrOfSuppliesByType("make-up");
  $medicine = getNrOfSuppliesByType("medicine");
  $office = getNrOfSuppliesByType("office-supplies");
  $check = getNrOfSuppliesByType("check-up");
  $insurance = getNrOfSuppliesByType("insurance");
  $spare = getNrOfSuppliesByType("spare-parts");
?>
<script>
    
   
var xValuesBar = ["January", "February", "March", "April ", "May ", "June", "July ", "August", "September ","October", "November ", "December"];
var yValuesBar = [<?php echo"$month1"?>, <?php echo"$month2"?>,<?php echo"$month3"?>,<?php echo"$month4"?>, <?php echo"$month5"?>, <?php echo"$month6"?>, <?php echo"$month7"?>, <?php echo"$month8"?>, <?php echo"$month9"?>, <?php echo"$month10"?>, <?php echo"$month11"?>, <?php echo"$month12"?>];

var barColors = ["#ea5545", "#f46a9b", "#ef9b20", "#edbf33", "#ede15b", "#bdcf32", "#87bc45", "#27aeef", "#b33dc6", "#b30000", "#7c1158", "#4421af"];
new Chart("myBarChart", {
  type: "bar",
  data: {
    labels: xValuesBar,
    datasets: [{
      backgroundColor: barColors,
      data: yValuesBar
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Numbers of set notices for yeach month"
    }
  }
});

var xValuesPie = ["Food", "Fuel", "Make-Up", "Medicine", "Office Supplies", "Check-Ups", "Insurance", "Spare Parts"];
var yValuesPie = [<?php echo"$food"?>, <?php echo"$fuel"?>,<?php echo"$makeUp"?>,<?php echo"$medicine"?>, <?php echo"$office"?>, <?php echo"$check"?>, <?php echo"$insurance"?>, <?php echo"$spare"?>];

new Chart("myPieChart", {
  type: "pie",
  data: {
    labels: xValuesPie,
    datasets: [{
      backgroundColor: barColors,
      data: yValuesPie
    }]
  },
  options: {
    title: {
      display: true,
      text: "Numbers of added Types"
    }
  }
});

</script>
            
        </div>
    </main>
    <?php 
        $id = $_SESSION["id"];
        require_once '../includes/functions.php';
        ini_set('display_errors','Off');
        
        notice($id);
        ?>
</body>
</html>