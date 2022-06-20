<?php
    require_once '../includes/functions.php';
    if(!session_id()){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="../responsive.css">
	<script src="../Resources/script.js"></script>
	<title>EsReP</title>
</head>

<body>
	<header>
		<a href="../Home/home.php"><img src="../EsReP.png" /></a>
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
				<li><a href="../Resources/office.php">Office Suplies</a></li>
				<li><a href="../Resources/tools.php">Tools</a></li>
			</ul>
			<a href="maintenance.php">Maintenance</a>
			<ul>
				<li><a href="spare.php">Spare Parts</a></li>
				<li><a id="focus" href="insurance.php">Insurance</a></li>
				<li><a href="check.php">Check Up</a></li>
			</ul>
		</div>
		<div class="right">
			<h3>Insurance</h3>
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
					createTable("insurance");
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
            insertNewRow($_SESSION["connection"], 'insurance', $_POST["newName"], $_POST["newQuantity"], $_POST["newUnit"], $_POST["newSupply"], $_POST["newNotice"]);

			if (canUpdate()) {
                foreach ($_POST as $postItem => $e) {
                    if (strpos($postItem, "updateRow") !== false) {
                        $itemId = str_replace("updateRow", "", $postItem);
                        $itemId = str_replace("_x", "", $itemId);
                        
                        updateRow($_SESSION["connection"], $itemId, 'insurance', $_POST["updateName"], $_POST["updateQuantity"], $_POST["updateUnit"], $_POST["updateSupplyDate"], $_POST["updateNoticeDate"]);
                        break;
                    }
                }
            }
			?>
		</div>
	</main>
</body>

</html>