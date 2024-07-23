<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <?php 
        session_start();

        if (!isset($_SESSION['otp']) || $_SESSION['otp'] !== true) {
            echo "<p class='error-message'>Unauthorized access.</p>";
            exit();
        }

        if (isset($_POST['btnreset'])) {
            if (isset($_POST['password']) && isset($_POST['conpassword']) && isset($_SESSION['email'])) {
                
                $pass = $_POST['password'];
                $pass2 = $_POST['conpassword'];
                $email = $_SESSION['email'];
                $hashed_pass = password_hash($pass2, PASSWORD_DEFAULT);

                if ($pass === $pass2) {
                    $sql = "UPDATE user_table SET Password='$hashed_pass' WHERE Email='$email'";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        echo "<p class='success-message'>Password has been successfully updated</p>";
                    } else {
                        echo "<p class='error-message'>Error updating password.</p>";
                    }
                } else {
                    echo "<p class='error-message'>Passwords do not match.</p>";
                }
            } else {
                echo "<p class='error-message'>Required fields are missing.</p>";
            }
        }
        ?>
        <form method="POST">
            <div class="input-box">
                <label for="password">New Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="input-box">
                <label for="conpassword">Confirm New Password:</label>
                <input type="password" name="conpassword" id="conpassword" required>
            </div>
            <button type="submit" name="btnreset" class="btn">Reset Password</button>
        </form>
    </div>
</body>
</html>
