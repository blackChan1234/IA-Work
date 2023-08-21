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


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="main.css" type="text/css">

</head>

<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <h1><span class="lab"></span>Admin Manager</h1>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="">
                    <img id="img" src="img/10.png" alt="" width="50" height="50">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="ui" href="Order.php">
                    <span>teenager</span>
                </a>
            </li>
            <li>
                <a class="ui" href="logout.php">
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div style="padding-left: 10%;">
    <main class="table">
        <section class="Table">
            <h1>Admin</h1>
            <div class="New-Data">
                <button type="button" onclick="window.location.href = 'create.php';">Add</button>
            </div>
        </section>
        <section class="Order">
            <table class="Manager">
                <tr>
                    <th>No</th>
                    <th>FullNameD</th>
                    <th>Description</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                <?php
                $connection = mysqli_connect("127.0.0.1", "root", "", "iadb");

                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM admin";

                $result = mysqli_query($connection, $sql);

                if (!$result) {
                    die("Invalid query: " . mysqli_error($connection));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                                <td>{$row['No']}</td>
                                <td>{$row['FullName']}</td>
                                <td>{$row['Description']}</td>
                                <td>{$row['ContactInformation']}</td>
                                <td>
                                    <a href='View.php?orderID={$row['No']}' class='view'>View</a>
                                    <a href='Delete.php?orderID={$row['No']}' class='delete'>Delete</a>
                                </td>
                            </tr>";
                }
                mysqli_close($connection);
                ?>
            </table>
        </section>
    </main>
</div>
</body>

</html>
