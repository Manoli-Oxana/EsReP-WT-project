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
            <?php 

            require_once "../includes/functions.php";
            require_once "../includes/dbh.php";
            if(!session_id())
            session_start (); 
           
            $userdata=getuserbyid($_SESSION["connection"],$_SESSION["id"]); 
             echo "<p><span>Registered: </span> ".$userdata["created"]."</p>
            <p><span>Last Log In: </span> ".$userdata["logged"]."</p>"?>
            <div id="form">
                <form method="post">
                    <section class = "change-email">
                        <label for="mail">Email</label>
        
                            <input type="email" name="mail" id="mail" required
                            placeholder="example@gmail.com">
                    </section>
        
                    <section class="change-password">
                        <label for="password">Password</label>
        
                            <input type="password" name="password" id="password" required
                            placeholder="********">
        
                        <label for="password2">Repeat the password</label>
        
                            <input type="password" name="password2" id="password2" required
                            placeholder="********">
                    </section>

                    <div class="buttons">
                        <a href="cabinet.php"><input class="button" type="submit" value="Save"></a>
                        <a href="../includes/logout.inc.php"><input class="button" type="button" value="Log Out"></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
