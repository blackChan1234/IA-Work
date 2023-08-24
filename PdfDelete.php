<?php
global $con;
include 'dbcon.php';

if (isset($_GET['pdfID'])) {
    $pdfID = $_GET['pdfID'];

    // Perform SQL query to delete record with the given pdfID
    $deleteQuery = "DELETE FROM pdf WHERE pdfID = '$pdfID'";
    $deleteResult = mysqli_query($con, $deleteQuery);

    if ($deleteResult) {
        // Record deleted successfully
        echo "<script>alert('Record deleted successfully.')</script>";
    } else {
        // Error deleting record
        echo "<script>alert('Error deleting record.')</script>";
    }
}

// Redirect back to PDF.php
header("Location: PDF.php");
exit(); // Important to prevent further execution of the script
?>

