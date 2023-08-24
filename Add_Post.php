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
    $p_user = $_SESSION['Name'];
    $p_description = $_POST['p_description'];

    // Upload image
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["p_img"]["name"]);
    move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file);

    // Get the filename from the uploaded file
    $filename = basename($_FILES["p_img"]["name"]);

    // Use prepared statements to avoid SQL injections
    $stmt = $conn->prepare("INSERT INTO post (heading, details, p_time, p_category, p_user, p_description, p_img) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $heading, $details, $p_time, $p_category, $p_user, $p_description, $filename);

    if ($stmt->execute()) {
        // Record inserted successfully
        echo "<script>alert('Record inserted successfully.')</script>";
        // Redirect to post.php
        header("Location: Post.php");
        exit();
    } else {
        // Error inserting record
        echo "<script>alert('Error inserting record.')</script>";
    }
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create New Record</title>
    <link rel="stylesheet" href="style/Add_Post.css" type="text/css">
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
                    <!-- Category dropdown -->
                    <select name="p_category" required>
                        <option value="" disabled selected>Select a category</option>
                        <option value="hot news">Hot News</option>
                        <option value="Positive view">Positive View</option>
                        <option value="negative view">Negative View</option>
                    </select>
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
