<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a href="#">Forgot password?</a>
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
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // PurchaseManager login
        $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
            $group = $row['group'];
            $Name = $row['Name']; // Retrieve managerName from the query result

            $_SESSION['group'] = $group;
            $_SESSION['email'] = $email;
            $_SESSION['Name'] = $Name;


            setcookie("user_logged_in", "true", time() + (5 * 60));
            header("Location: index.php"); // redirect to dashboard
            exit;
        }
        // If reached this point, login has failed
        echo '<div id="error-message" class="text-center alert alert-danger" role="alert">Invalid login information.</div>';
        echo '<script>setTimeout(function(){ document.getElementById("error-message").style.display = "none"; }, 5000);</script>';

        mysqli_free_result($result);
        mysqli_close($conn);
    }
    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
