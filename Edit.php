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
    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userID = $_POST['userID'];

    $updateQuery = "UPDATE user SET Name='$Name', email='$email', password='$password' WHERE userID=$userID";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Redirect to AdminIndex.php after update
        header("Location: AdminIndex.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "<script>alert('Error updating record.')</script>";
    }
}

if (isset($_GET['userID'])) {
    $userID = $_GET['userID']; // Fixed variable name

    $selectQuery = "SELECT * FROM user WHERE userID=$userID"; // Fixed variable name
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
    <link rel="stylesheet" href="style/Create.css" type="text/css">
    <link rel="stylesheet" href="style/Add_Post.css" type="text/css">
</head>

<body>
<div style="padding-left: 10%;">
    <div class="New-Data">
    <main class="edit-form">
        <h1>Edit Admin Data</h1>
        <form method="post">
            <input type="hidden" name="userID" value="<?php echo $userID; ?>">
            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" id="Name" name="Name" value="<?php echo $row['Name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">email:</label>
                <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">password:</label>
                <input type="text" id="password" name="password" value="<?php echo $row['password']; ?>" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </main>
</div>
</div>
</body>

</html>
