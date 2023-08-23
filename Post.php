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

if (isset($_POST['clear'])) {
    // Perform SQL query to delete all records from the admin table
    $deleteQuery = "DELETE FROM post";
    $deleteResult = mysqli_query($conn, $deleteQuery);
    if ($deleteResult) {
        // Records deleted successfully
        echo "<script>alert('All records have been deleted.')</script>";
    } else {
        // Error deleting records
        echo "<script>alert('Error deleting records.')</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="Admin.css" type="text/css">
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
                    <img id="img" src="img/10.png" alt="" width="50" height="50">
                    <span>teenager</span>
                </a>
            </li>
            <li>
                <a class="ui" href="About.php">
                    <img id="img" src="img/3.png" alt="" width="50" height="50">
                    <span>About US</span>
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
<div style="padding-left: 10%;">
    <main class="table">
        <section class="Table">
            <h1>Post</h1>
            <div class="New-Data">
                <form method="post">
                    <button type="button" onclick="window.location.href = 'Add_Post.php';">Add</button>
                    <button type="submit" name="clear">Clear All</button>
                </form>
            </div>
        </section>
        <section class="Order">
            <table class="Manager">
                <tr>
                    <th>No</th>
                    <th>heading</th>
                    <th>details</th>
                    <th>time </th>
                    <th>user</th>
                    <th>description</th>
                    <th>category</th>
                    <th>img</th>
                    <th>Action</th>
                </tr>
                <?php
                $connection = mysqli_connect("127.0.0.1", "root", "", "iadb");

                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM post";

                $result = mysqli_query($connection, $sql);

                if (!$result) {
                    die("Invalid query: " . mysqli_error($connection));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                <td>{$row['p_id']}</td>
                <td>{$row['heading']}</td>
                <td>{$row['details']}</td>
                <td>{$row['p_time']}</td>
                <td>{$row['p_category']}</td>
                <td>{$row['p_user']}</td>
                <td>{$row['p_description']}</td>
                <td><img src='img/{$row['p_img']}?r=" . rand() . "' alt='Image' height='120px' width='130px'></td>
                <td>
                    <a href='PEdit.php?p_id={$row['p_id']}' class='view'>Edit</a>
                    <a href='PDelete.php?p_id={$row['p_id']}' class='delete' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
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
