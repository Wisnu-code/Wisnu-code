<?php
session_start();
include ("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if (password_verify($password, $user_data['password'])) {
                $_SESSION['user_id'] = $user_data['id'];
                header("Location: index.php");
                die;
            }
        }

        echo "Invalid username or password!";
    } else {
        echo "Please enter valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Login
            </a>
        </div>
    </nav>
    <form method="post">
        <div>Login</div>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        
        <input type="submit" value="Login">

        <div class="card-body">
            <p class="card-text fs-6 mt-3">Don't have account?</p>
            <a href="register.php" class="btn btn-primary">Register</a>
        </div>
    </form>
</body>
</html>