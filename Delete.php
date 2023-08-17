<?php
global $con;
include 'dbcon.php';

if (isset($_GET['pdfID'])) {
    $pdfID = $_GET['pdfID'];

    // Perform deletion query
    $deleteQuery = "DELETE FROM pdf WHERE pdfID = $pdfID";
    $deleteResult = mysqli_query($con, $deleteQuery);

    if ($deleteResult) {
        // Redirect back to the page after successful deletion
        header("Location: info.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>

