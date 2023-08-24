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

if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];

    if (isset($_POST['update'])) {
        $heading = $_POST['heading'];
        $details = $_POST['details'];
        $p_time = $_POST['p_time'];
        $p_category = $_POST['p_category'];
        $p_user = $_POST['p_user'];
        $p_description = $_POST['p_description'];

        // Handle image upload if a new image is selected
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["p_img"]["name"]);
        if (!empty($_FILES["p_img"]["tmp_name"])) {
            move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file);
            $p_img = $target_file;
        } else {
            $p_img = $_POST['existing_img']; // If no new image, use the existing one
        }

        // Update query
        $updateQuery = "UPDATE post SET heading='$heading', details='$details', p_time='$p_time', p_category='$p_category', p_user='$p_user', p_description='$p_description', p_img='$p_img' WHERE p_id='$p_id'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            // Redirect back to the page after successful update
            header("Location: POST.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    // Retrieve the existing record for editing
    $selectQuery = "SELECT * FROM post WHERE p_id='$p_id'";
    $selectResult = mysqli_query($conn, $selectQuery);
    $row = mysqli_fetch_assoc($selectResult);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="style/Add_Post.css" type="text/css">
</head>

<body>
<div style="padding-left: 10%;">
    <main class="table">
        <section class="Table">
            <h1>Edit Post</h1>
            <div class="New-Data">
                <form method="post" enctype="multipart/form-data">
                    <input type="text" name="heading" value="<?php echo $row['heading']; ?>" required>
                    <textarea name="details" required><?php echo $row['details']; ?></textarea>
                    <input type="datetime-local" name="p_time" value="<?php echo date('Y-m-d\TH:i', strtotime($row['p_time'])); ?>" required>
                    <input type="text" name="p_category" value="<?php echo $row['p_category']; ?>" required>
                    <input type="text" name="p_user" value="<?php echo $row['p_user']; ?>" required>
                    <textarea name="p_description" required><?php echo $row['p_description']; ?></textarea>
                    <input type="hidden" name="existing_img" value="<?php echo $row['p_img']; ?>">
                    <input type="file" name="p_img" accept="image/*">
                    <button type="submit" name="update">Update</button>
                </form>
            </div>
        </section>
    </main>
</div>
</body>

</html>
