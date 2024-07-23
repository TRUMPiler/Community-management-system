<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
        table {
            width: 100%;
        }
        td {
            padding: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input type="email" name="email" id="email" required></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="btnsubmit">Send OTP</button></td>
                </tr>
            </table>
        </form>
        <?php 
            session_start();
            
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnsubmit'])) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $otp = rand(100000, 999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['email'] = $email;

                    $subject = "Your OTP Code";
                    $message = "Your OTP code is $otp";
                    $headers = "From: umafoundation123@gmail.com";

                    if (mail($email, $subject, $message, $headers)) {
                        header('Location: handle_recovery.php');
                    } else {
                        echo "<p style='color:red;'>Failed to send OTP. Please try again.</p>";
                    }
                } else {
                    echo "<p style='color:red;'>Invalid email address. Please enter a valid email.</p>";
                }
            }
        ?>
    </div>
</body>
</html>
