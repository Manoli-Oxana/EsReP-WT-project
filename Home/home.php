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
            <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>

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

  
?>
<script>
    
   
var xValues = ["January", "February", "March", "April ", "May ", "June", "July ", "August", "September ","October", "November ", "December"];
var x = "<?php echo"$month1"?>";
var_dump(x);
var yValues = [$month1, $month2,$month3, $month4, $month5, $month6, $month7, $month8, $month9, $month10, $month11, $month12];

var barColors = ["red", "green","blue","orange","brown","blue","orange","brown","blue","orange","brown","blue" ];
new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Products that "
    }
  }
});

</script>
            
        </div>
    </main>
    <?php 
        ini_set('display_errors','Off');
        $id = $_SESSION["id"];
        notice($id);
        ?>
</body>
</html>