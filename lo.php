<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <form action="" method="post">
        <div class="container" id="login">

            <h1 class="form-title">Log In</h1>

            <div class="input-box">
                <i class='bx bxs-user'></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-box">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <p class="recover">
                <a href="#">Recover Password</a>
                <input type="submit" class="btn" value="Log in" name="login">
            </p>
            <div class="recover1">
                <p>Don't have an account yet?</p>
                <a href="register.php">Register</a>
            </div>
        </div>
    </form>
    <?php
session_start();
include 'connect.php';

// Check if user is already logged in
if (!empty($_SESSION['Email']) && !empty($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['email'];
    $pass = $_POST['password'];

    if (!empty($email) && !empty($pass)) {
        // Sanitize input (optional)
        $email = mysqli_real_escape_string($con, $email);
        

        $sql = "SELECT * FROM user_table WHERE Email='$email'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['Email'];
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: home.php");
            exit();
        } else {
            header("Location: login.php"); // Redirect back to login page if credentials are incorrect
            exit();
        }
    } else {
        header("Location: login.php"); // Redirect back to login page if fields are empty
        exit();
    }
}

mysqli_close($con);
?>
