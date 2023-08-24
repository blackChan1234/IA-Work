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

// Get the current maximum No from the database
$query = "SELECT MAX(userID) as maxuserID FROM user";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$currentMaxUserID = $row['maxuserID'];

// Calculate the next No by incrementing the currentMaxNo by 1
$nextNo = $currentMaxUserID + 1;
$group = "admin";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert the new data into the database
    $query = "INSERT INTO user (userID, Name, email, password, `group`) VALUES ($nextNo, '$Name', '$email', '$password', '$group')";
    $result = mysqli_query($conn, $query);
    sleep(1);
    header("Location: AdminIndex.php");
    exit();
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/Create.css" type="text/css">
    <title>Create Data</title>
</head>
<body>
<main class="table">
    <section class="Table">
        <h1>Information</h1>
    </section>
    <section class="Order">
        <form method="POST" enctype="multipart/form-data">
            <label for="userID">userID:</label>
            <input type="text" name="userID" value="<?php echo $nextNo; ?>" readonly><br>
            <label for="Name">Name:</label>
            <input type="text" name="Name" required><br>
            <label for="email">Email:</label>
            <input type="text" name="email" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <button type="submit">ADD</button>
        </form>
    </section>
</main>
</body>
</html>
