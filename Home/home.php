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
            <img src="diagram.jpg">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta dolor faucibus, ultricies nibh vitae, vestibulum odio. Ut dictum at enim nec efficitur. In sit amet pretium nibh. Vestibulum vehicula a mauris in sagittis. Nullam vel lorem sapien. Ut ut malesuada ipsum. In vel enim a risus volutpat consectetur. Donec vitae turpis aliquet, sollicitudin erat id, iaculis erat. In hac habitasse platea dictumst. Donec dapibus metus ut arcu sollicitudin ultrices. Nunc nec auctor nunc, et lobortis mauris. Pellentesque non lorem iaculis, placerat nunc id, tincidunt lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed vulputate urna nec pretium laoreet. Etiam ac purus non mauris ultricies pellentesque. Curabitur interdum sit amet dolor in interdum.
    
                Sed aliquam neque ultricies ante eleifend pretium vitae non leo. Donec non dictum turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fermentum ut diam at dapibus. Mauris quam metus, tempus ac mi sit amet, rhoncus bibendum nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id sem metus. Phasellus feugiat massa a lacus egestas sollicitudin. Donec aliquam vehicula tincidunt. Sed vel ante volutpat, dictum nulla in, maximus augue. Etiam vestibulum purus justo, vitae finibus nulla convallis rhoncus. Vestibulum tortor nulla, tincidunt et accumsan id, lobortis ut enim.
            </p>
        </div>
    </main>
    <?php 
        ini_set('display_errors','Off');
        $id = $_SESSION["id"];
        notice($id);
        ?>
</body>
</html>