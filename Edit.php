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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newFullName = $_POST['newFullName'];
    $newDescription = $_POST['newDescription'];
    $newContact = $_POST['newContact'];
    $recordNo = $_POST['recordNo'];

    $updateQuery = "UPDATE admin SET FullName='$newFullName', Description='$newDescription', ContactInformation='$newContact' WHERE No=$recordNo";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Redirect to Index.php after update
        header("Location: AdminIndex.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "<script>alert('Error updating record.')</script>";
    }
}

if (isset($_GET['No'])) {
    $recordNo = $_GET['No'];

    $selectQuery = "SELECT * FROM admin WHERE No=$recordNo";
    $selectResult = mysqli_query($conn, $selectQuery);

    if ($selectResult) {
        $row = mysqli_fetch_assoc($selectResult);
    } else {
        echo "<script>alert('Error fetching record data.')</script>";
    }

}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Admin Data</title>
    <link rel="stylesheet" href="Create.css" type="text/css">
</head>

<body>
<div style="padding-left: 10%;">
    <main class="edit-form">
        <h1>Edit Admin Data</h1>
        <form method="post">
            <input type="hidden" name="recordNo" value="<?php echo $recordNo; ?>">
            <div class="form-group">
                <label for="newFullName">Full Name:</label>
                <input type="text" id="newFullName" name="newFullName" value="<?php echo $row['FullName']; ?>" required>
            </div>
            <div class="form-group">
                <label for="newDescription">Description:</label>
                <textarea id="newDescription" name="newDescription" required><?php echo $row['Description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="newContact">Contact:</label>
                <input type="text" id="newContact" name="newContact" value="<?php echo $row['ContactInformation']; ?>" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </main>
</div>
</body>

</html>
