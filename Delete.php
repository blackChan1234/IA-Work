<?php
global $con;
include 'dbcon.php';

if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];

    // Perform deletion query
    $deleteQuery = "DELETE FROM user WHERE userID = $userID";
    $deleteResult = mysqli_query($con, $deleteQuery);

    if ($deleteResult) {
        // Redirect back to the page after successful deletion
        header("Location: AdminIndex.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>

