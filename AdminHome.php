<?php
session_start();
global $con;
include 'dbcon.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="AdminHome.css" type="text/css">
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
                <a class="ui" href="AdminIndex.php">
                    <span>teenager</span>
                </a>
            </li>
            <li>
                <a class="ui" href="About.php">
                    <span>About US</span>
                </a>
            </li>
            <li>
                <a class="ui" href="Contact.php">
                    <span>Contact US</span>
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
        </section>
        <section class="Order">
            <div class="grid-container">
                <div class="grid-item">
                    <form>
                        <label for="No">No:</label>
                        <input type="text" name="No" value="<?php echo $nextNo; ?>" readonly><br>
                        <label for="Full Name">Full Name:</label>
                        <input type="text" name="FullName" required><br>
                        <label for="Description">Description:</label>
                        <input type="text" name="Description" required><br>
                        <label for="ContactInformation">Contact:</label>
                        <input type="tel" name="ContactInformation" required pattern="[2-9]{1}[0-9]{7}" title="Please enter a valid 8-digit Hong Kong phone number (starting with 2-9)"><br>
                        <button type="submit">ADD</button>
                    </form>
                </div>

                <div class="grid-item">
                    <form>
                        <tr>
                            <th>No</th>
                            <th>FullName</th>
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
                                    <a href='Edit.php?No={$row['No']}' class='view'>Edit</a>
                                    <a href='Delete.php?No={$row['No']}' class='delete' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                                </td>
                            </tr>";
                        }
                        mysqli_close($connection);
                        ?>
                    </form>
                </div>

                <div class="grid-item">
                    <form>
                        <!-- Form 3 content... -->
                    </form>
                </div>
                <div class="grid-item">
                    <form>
                        <div id="cursor">
                            <div class="background">
                                <div class="table-responsive">
                                    <table>
                                        <thead>
                                        <th>ID</th>
                                        <th>UserName</th>
                                        <th>FileName</th>
                                        <th>FileDescription</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $selectQuery = "SELECT * FROM pdf";
                                        $squery = mysqli_query($con, $selectQuery);

                                        while ($result = mysqli_fetch_assoc($squery)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $result['pdfID']; ?></td>
                                                <td><?php echo isset($result['userName']) ? $result['userName'] : ''; ?></td>
                                                <td>
                                                    <?php if (isset($result['fileName'])): ?>
                                                        <a href="./pdf/<?php echo $result['fileName']; ?>" download><?php echo $result['fileName']; ?></a>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo isset($result['pdfDescription']) ? $result['pdfDescription'] : ''; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="button" href ="";>View All</button>
                    </form>
                </div>
                <div class="grid-item">
                    <form>
                        <div id="cursor">
                            <div class="background">
                                <div class="table-responsive">
                                    <table>
                                        <thead>
                                        <th>ID</th>
                                        <th>UserName</th>
                                        <th>FileName</th>
                                        <th>FileDescription</th>
                                        </thead>
                                        <tbody>
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
                               
                            </tr>";
                                        }
                                        mysqli_close($connection);
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
