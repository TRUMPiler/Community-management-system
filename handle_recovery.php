<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate OTP</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
}
.container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.input-box {
    margin-bottom: 15px;
}
.input-box label {
    display: block;
    margin-bottom: 5px;
}
.input-box input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
button.btn {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    width: 100%;
}
button.btn:hover {
    background-color: #45a049;
}
.error-message {
    color: red;
}
.success-message {
    color: green;
}

    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate OTP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Validate OTP</h2>
        <form method="POST">
            <div class="input-box">
                <label for="otp">OTP:</label>
                <input type="text" name="otp" required maxlength="6">
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
    </div>
</body>
</html>

