<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/login.css">
    <title>Login Page</title>


</head>

<body>


    <div class="container">


        <div class="row justify-content-center mt-5">
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="Forgot%20Password.php">Forgot password?</a>
                        <div class="sign-up mt-2">
                            <p>Don't have an account? <a href="SingUp.php" class="signup-link">Sign up</a></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    session_start();
    if (isset($_COOKIE["user_logged_in"])) {
        header("Location: index.html"); // redirect to dashboard if user is already logged in
        exit;
    }

    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "iadb"; /* Database name */

    $conn = mysqli_connect($host, $user, $password, $dbname) or die(mysqli_connect_error());

    if(isset($_POST['email']) && isset($_POST['password'])) {

        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Use prepared statement
        $stmt = $conn->prepare("SELECT email, password, `group`, Name FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        if($row = $result->fetch_assoc()){
            // Use password_verify to compare passwords
            if(password_verify($_POST['password'], $row['password'])) {
                $_SESSION['group'] = $row['group'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['Name'] = $row['Name'];

                setcookie("user_logged_in", "true", time() + (5 * 60));
                header("Location: index.html"); // redirect to dashboard
                exit;
            }
        }

        // If reached this point, login has failed
        echo '<div id="error-message" class="text-center alert alert-danger" role="alert">Invalid login information.</div>';
        echo '<script>setTimeout(function(){ document.getElementById("error-message").style.display = "none"; }, 5000);</script>';

        $stmt->close();
        mysqli_close($conn);
    }
    ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
