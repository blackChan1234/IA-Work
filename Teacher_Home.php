<?php
session_start();


$hostname = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name = "iadb";

$conn = mysqli_connect($hostname, $db_username, $db_password, $db_name) or die(mysqli_connect_error());

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style/AdminHome.css" type="text/css">
    <link rel="stylesheet" href="style/Admin.css" type="text/css">
</head>
<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <h1><span class="lab"></span>Teacher</h1>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="Teacher_Home.php">
                    <img id="img" src="img/10.png" alt="" width="50" height="50">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="ui" href="Teacher_Post.php">
                    <img id="img" src="img/2.png" alt="" width="50" height="50">
                    <span>POST</span>
                </a>
            </li>
            <li>
                <a class="ui" href="Teacher_PDF.php">
                    <img id="img" src="img/3.png" alt="" width="50" height="50">
                    <span>PDF</span>
                </a>
            </li>
            <li>
                <a class="ui" href="logout.php">
                    <img id="img" src="img/5.png" alt="" width="50" height="50">
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</div>


                </div>
            </div>
        </section>
    </main>
</body>
</html>
