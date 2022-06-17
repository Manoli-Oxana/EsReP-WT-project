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
            <a href="home.php">Home</a>
            <a href="../features/import.php">Import</a>
            <a href="../features/export.php">Export</a>
            <a href="cabinet.php">My Cabinet</a>
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
        <div id="cabinet" class="right">
            <h2>My Cabinet</h2>
            <p><span>Registered: </span> 12.04.2022</p>
            <p><span>Last Log In: </span> 16.04.2022</p>
            <div id="form">
                <form method="post" action="../includes/change-password.php">
                    
                    <section class="change-password">
                        <label for="old-pwd">Old Password</label>
        
                            <input type="password" name="old-pwd" id="old-pwd" required
                            placeholder="********">
                   
                        <label for="password">New Password</label>
        
                            <input type="password" name="password" id="password" required
                            placeholder="********">
        
                        <label for="password2">Confirm New Password</label>
        
                            <input type="password" name="password2" id="password2" required
                            placeholder="********">
                    </section>

                    <button  class="button" type="submit" name="submit">Change Password</button>
                    <div class="buttons">
                        <a href="../includes/logout.inc.php"><input class="button" type="button" value="Log Out"></a>
                    </div>
                    <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "wrongOldPass"){
                echo "<p>Incorrect old password!</p>";
                 }   
                 else  if($_GET["error"] == "passdontmatch"){
                    echo "<p>New passwords don't match!</p>";
                     }
                     else  if($_GET["error"] == "updatefailed"){
                        echo "<p>Something went wrong!</p>";
                         }
                         else  if($_GET["error"] == "none"){
                            echo "<p>You have updated your password!</p>";
                             }
            }         
            ?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>