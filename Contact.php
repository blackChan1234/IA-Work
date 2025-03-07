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

// ...

// Perform query to fetch contact data
$sql = "SELECT * FROM contact";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Invalid query: " . mysqli_error($conn));
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="style/Admin.css" type="text/css">
    <link rel="stylesheet" href="style/Contact.css" type="text/css">
</head>

<body>
<div class="sidebar">
    <div class="sidebar-brand">
        <h1><span class="lab"></span>Admin Manager</h1>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="AdminHome.php">
                    <img id="img" src="img/10.png" alt="" width="50" height="50">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="ui" href="POST.php">
                    <img id="img" src="img/2.png" alt="" width="50" height="50">
                    <span>POST</span>
                </a>
            </li>
            <li>
                <a class="ui" href="AdminIndex.php">
                    <img id="img" src="img/50.png" alt="" width="50" height="50">
                    <span>Person</span>
                </a>
            </li>
            <li>
                <a class="ui" href="PDF.php">
                    <img id="img" src="img/3.png" alt="" width="50" height="50">
                    <span>PDF</span>
                </a>
            </li>
            <li>
                <a class="ui" href="Contact.php">
                    <img id="img" src="img/4.png" alt="" width="50" height="50">
                    <span>Contact US</span>
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
<div id="mainTable">
    <main class="table">
        <section class="Table">
            <h1>Contact Us</h1>
            <div class="New-Data">
            </div>
        </section>
        <section class="Order">
            <form class="Contact" method="post" action="updateContact.php">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                    <td><input type='text' name='name' value='{$row['Name']}' readonly></td>
                                    <td><input type='text' name='phone' value='{$row['Phone']}'></td>
                                    <td><input type='text' name='email' value='{$row['Email']}'></td>
                                    <td><input type='text' name='address' value='{$row['Address']}'></td>
                                    <td><button type='submit'>Update</button></td>
                                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </form>
        </section>
    </main>
</div>
</body>

</html>
