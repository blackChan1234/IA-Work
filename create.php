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
$query = "SELECT MAX(No) as maxNo FROM admin";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$currentMaxNo = $row['maxNo'];

// Calculate the next No by incrementing the currentMaxNo by 1
$nextNo = $currentMaxNo + 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $FullName = $_POST['FullName'];
    $Description = $_POST['Description'];
    $ContactInformation = $_POST['ContactInformation'];

    // Insert the new data into the database
    $query = "INSERT INTO admin (No, FullName, Description, ContactInformation) VALUES ('$nextNo','$FullName', '$Description', '$ContactInformation')";
    $result = mysqli_query($conn, $query);
    sleep(1);
    header("Location: Order.php");
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
    <link rel="stylesheet" href="Create.css" type="text/css">
    <title>Create Data</title>
</head>
<body>
<main class="table">
    <section class="Table">
        <h1>Information</h1>
    </section>
    <section class="Order">
        <form method="POST" enctype="multipart/form-data">
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
    </section>
</main>
</body>
</html>
