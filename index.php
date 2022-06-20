<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <title>EsReP</title>
</head>
<body>
    <header>
        <img id="logo" src="EsReP.png">
        <nav>
            <a href="index.php">Home</a>
            <?php
             if(isset($_SESSION["id"])){
                header('location: Home/home.php');
             }
             else{
               echo "<a href='Accounts/login.php'>Log In</a>";
               echo "<a href='Accounts/register.php'>Register</a>";
             }
            ?>
        </nav>
    </header>
    
    
    <main>
        <div id="leftmenu">
            <a href="Landing/resland.php">Resources</a>
            <a href="Landing/mainland.php">Maintenance</a>
        </div>
        <div id="rightmenu">
            <h3>About the app</h3>
            <p>
                ESReP was created to help people keep track of their necessities. From individual use, to household needs and organisational resources, ESReP allows its users to upload their previous databases, be they in XML, CSV or JSON to use with the app, edit their databases, edit their notice dates and even delete entries.
                Setting the notice date will allow the app to notify you with an in-app alert about the entries that either need replenished or a check-up. ESReP also provides the useful export function in the aforementioned formats, for those who want to save monthly or daily snopshots of their resources.
            </p>
            <h3>How to Use</h3>
            <p>
                In order to use the ESReP web application, the following steps are recomended:
                <ol>
                    <li>Create an account through register or log in with your credentials if you already have an account</li>
                    <li>If you already have a database of resources in XML, JSON or CSV format, upload them using the Import function</li>
                    <li>Add to the databases and/or eddit/delete the entries in their respective type's tables. Don't forget to refresh the page!</li>
                    <li>Keep the database up-to-date on the quantity or dates</li>
                    <li>Once a notify deadline is reached, logging into the app will open an alert with the list of entries you need to check on. Don't forget to edit the notice date in order to stop the alert</li>
                    <li>The home page will also provide a bar chart of the number of notices in each month and a pie chart of type specific entries</li>
                    <li>In case a snapshot is needed, the export function can download the current database in a XML, JSON or CSV</li>
                    <li>My Cabinet allows you to change the password and log out of the account</li>
                </ol>

            </p>
        </div>
    </main>
    
</body>
</html>