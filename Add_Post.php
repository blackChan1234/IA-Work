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

if (isset($_POST['submit'])) {
    $heading = $_POST['heading'];
    $details = $_POST['details'];
    $p_time = $_POST['p_time'];
    $p_category = $_POST['p_category'];
    $p_user = $_POST['p_user'];
    $p_description = $_POST['p_description'];

    // Upload image
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["p_img"]["name"]);
    move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file);

    // Perform SQL query to insert new record
    $insertQuery = "INSERT INTO post (heading, details, p_time, p_category, p_user, p_description, p_img) VALUES ('$heading', '$details', '$p_time', '$p_category', '$p_user', '$p_description', '$target_file')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        // Record inserted successfully
        echo "<script>alert('Record inserted successfully.')</script>";
        // Redirect to post.php
        header("Location: Post.php");
        exit(); // Important to prevent further execution of the script
    } else {
        // Error inserting record
        echo "<script>alert('Error inserting record.')</script>";
    }
}

mysqli_close($conn);
?>


<!-- Your HTML form for adding a new record -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create New Record</title>
    <link rel="stylesheet" href="Add_Post.css" type="text/css">
</head>

<body>
<div style="padding-left: 10%;">
    <main class="table">
        <section class="Table">
            <h1>Create New Record</h1>
            <div class="New-Data">
                <form method="post" enctype="multipart/form-data">
                    <input type="text" name="heading" placeholder="Heading" required>
                    <textarea name="details" placeholder="Details" required></textarea>
                    <input type="datetime-local" name="p_time" required>
                    <input type="text" name="p_category" placeholder="Category" required>
                    <input type="text" name="p_user" placeholder="User" required>
                    <textarea name="p_description" placeholder="Description" required></textarea>
                    <input type="file" name="p_img" accept="image/*" required>
                    <button type="submit" name="submit">ADD</button>
                </form>
            </div>
        </section>
    </main>
</div>
</body>

</html>
