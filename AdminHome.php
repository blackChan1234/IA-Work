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

<div style="padding-left: 10%;">
    <main class="table">
        <section class="Table">
            <h1>Home</h1>
        </section>
        <section class="Order">
            <div class="grid-container">
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
                    <button type="button" onclick="window.location.href='AdminIndex.php';">View All</button>

                </div>

                <div class="grid-item-2">
                    <form>
                        <section class="Order">
                            <table class="Manager">
                                <tr>
                                    <th>No</th>
                                    <th>heading</th>
                                    <th>details</th>
                                    <th>user</th>
                                    <th>category</th>
                                    <th>img</th>
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
                        <td>{$row['p_category']}</td>
                       <td>{$row['p_user']}</td>
                       <td><img src='img/{$row['p_img']}?r=" . rand() . "' alt='Image' height='120px' width='130px'></td>
            </tr>";
                                }
                                mysqli_close($connection);
                                ?>
                            </table>
                        </section>
                    </form>
                    <button type="button" onclick="window.location.href='Post.php';">View All</button>

                </div>
                <div class="grid-item-3">
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
                        <button type="button" onclick="window.location.href='PDF.php';">View All</button>
                    </form>
                </div>
                <div class="grid-item-4">
                    <section class="Order">
                        <form class="Manager" method="post">
                            <?php
                            $sql = "SELECT * FROM contact";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <form method='post'>
                                        <td>Name: <input type='text' name='name' value='<?php echo $row['Name']; ?>' readonly></td>
                                        <td>Phone: <input type='text' name='phone' value='<?php echo $row['Phone']; ?>'></td>
                                        <td>Email: <input type='text' name='email' value='<?php echo $row['Email']; ?>'></td>
                                        <td>Address: <input type='text' name='address' value='<?php echo $row['Address']; ?>'></td>
                                        <button type="button" onclick="window.location.href='Contact.php';">View All</button>
                                    </form>
                                </tr>
                                <?php
                            }
                            ?>
                        </form>
                    </section>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
