<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate OTP</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <div class="container">
        <h2>Validate OTP</h2>
        <form method="POST">
            <div class="input-box">
                <label for="otp">OTP:</label>
                <input type="text" name="otp" id="otp" required maxlength="6">
            </div>
            <button type="submit" name="btnsubmitt" class="btn">Validate OTP</button>
        </form>

        <?php 
        session_start();

        if (isset($_POST['btnsubmitt'])) {
            $otp = $_POST['otp'];

            if ($_SESSION['otp'] == $otp) {
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
        <?php 
            } else {
                echo "<p class='error-message'>Invalid OTP. Please try again.</p>";
            }
        }

        if (isset($_POST['btnreset'])) {
            if (isset($_POST['password']) && isset($_POST['conpassword']) && isset($_SESSION['email'])) {
                include 'connect.php';
                $pass = $_POST['password'];
                $pass2 = $_POST['conpassword'];
                $email = $_SESSION['email'];
                $hashed_pass = md5($pass);

                if ($pass === $pass2) {
                    $sql = "UPDATE tbl_user SET password='$hashed_pass' WHERE email='$email'";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        echo "<script>alert('password successful!');window.location='login.php'</script>";
                        
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
    </div>
</body>
</html>
