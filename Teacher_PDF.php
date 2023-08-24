<?php
global $con;
include 'dbcon.php';

if (isset($_POST['clear'])) {
    // Perform SQL query to delete all records with pdfID
    $deleteQuery = "DELETE FROM pdf"; // Corrected the query
    $deleteResult = mysqli_query($con, $deleteQuery);
    if ($deleteResult) {
        // Records deleted successfully
        echo "<script>alert('All records have been deleted.')</script>";
    } else {
        // Error deleting records
        echo "<script>alert('Error deleting records.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="style/Admin.css" type="text/css">
    <link rel="stylesheet" href="style/PDF.css" type="text/css">
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
<div id="cursor">
    <div class="background">
        <h1>PDF</h1>
        <form action="Teacher_PDF.php" method="post" enctype="multipart/form-data" name="form">
            <script language="javascript" type="text/javascript">
                alertTest();
            </script>
            <fieldset class="form">
                <a href="Teacher_upload.php"><button type="button">Add</button></a>
                <button type="submit" name="clear" onclick="return confirm('Are you sure you want to clear all records?');">Clear</button>
                <div id="cursor">
                    <div class="background">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                <th>ID</th>
                                <th>UserName</th>
                                <th>FileName</th>
                                <th>FileDescription</th>
                                <th>Option</th>
                                </thead>
                                <tbody>
                                <?php
                                // Start the session if it hasn't been started yet
                                if (!session_id()) {
                                    session_start();
                                }

                                // Check if 'Name' exists in the session
                                if (isset($_SESSION['Name'])) {
                                    $userName = $_SESSION['Name'];
                                    $selectQuery = "SELECT * FROM pdf WHERE userName = '$userName'";
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
                                            <td>
                                                <a href='PdfDelete.php?pdfID=<?php echo $result['pdfID']; ?>' class='delete' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    // Handle the case where 'Name' is not set in the session, if needed
                                    echo "Username not found in session!";
                                }
                                ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</fieldset>
</body>

</html>
