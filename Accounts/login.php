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
        <a href="../index.php"><img src="../EsReP.png"></a>
        <nav>
            <a href="../index.php">Home</a>
            <a href="login.php">Log In</a>
            <a href="register.php">Register</a>
        </nav>
    </header>

    <div id="form">
        <form method="post" action="../includes/login.inc.php">
            <label for="mail">Email</label>

                <input type="email" name="mail" id="mail" required
                placeholder="example@gmail.com">

            <label for="password">Password</label>

                <input type="password" name="password" id="password" required
                placeholder="********">

                <button  class="button" type="submit" name="submit">Log In</button>
                <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "wronglogin"){
                echo "<p>Incorrect login information!</p>";
                 }   
                 else  if($_GET["error"] == "updatefailed"){
                    echo "<p>Something went wrong!</p>";
                     }
            }         
            ?>
            </form>
    </div>
</body>
</html>
