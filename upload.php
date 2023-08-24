<?php
include 'dbcon.php';

session_start();

if (isset($_POST['submit'])) {
    // Use prepared statements to avoid SQL injections
    $stmt = $con->prepare("INSERT INTO pdf (username, filename, pdfDescription) VALUES (?, ?, ?)");

    $name = $_SESSION['Name'];
    $Description = $_POST['Description'];
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];

    if (move_uploaded_file($file_tmp, "./pdf/" . $file_name)) {
        $stmt->bind_param("sss", $name, $file_name, $Description);

        if ($stmt->execute()) {
            echo '<div class="alert alert-success alert-dismissible fade show text-center">
            <a class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Success!</strong> Data submitted successfully.
            </div>';

            header("Location: PDF.php");
            exit();
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show text-center">
            <a class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Failed!</strong> Try Again!
            </div>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show text-center">
        <a class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Failed!</strong> File must be uploaded in PDF format!
        </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/uploadStyle.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <h2 class="mb-4">Upload Data</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" placeholder="Enter file Description" name="Description" required>
                </div>
                <div class="form-group">
                    <label>Upload PDF:</label>
                    <input type="file" name="pdf_file" class="form-control" accept=".pdf" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
