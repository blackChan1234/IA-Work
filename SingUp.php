<?php
// Connect to database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "iadb";

$conn = mysqli_connect($host, $user, $password, $dbname) or die(mysqli_connect_error());

if (isset($_POST['email'], $_POST['password'], $_POST['name'], $_POST['confirm_password'])) {

    // Check if password and confirm password match
    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "Passwords do not match!";
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $name = mysqli_real_escape_string($conn, $_POST['name']);

        // Check if the email is already in the database
        $checkEmailQuery = "SELECT email FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($result) > 0) {
            echo "Email already in use!";
        } else {
            // Insert into database
            $query = "INSERT INTO user (email, password, Name) VALUES ('$email', '$password','$name')";

            if (mysqli_query($conn, $query)) {
                echo "Signup successful! Please check your email for a verification code.";
                header("Location: Login.php"); // redirect to dashboard
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Signup Page</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Signup</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
