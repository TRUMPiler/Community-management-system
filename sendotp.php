<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css"> <!-- Ensure the path is correct -->
</head>
<style>
    /* Reset some default browser styles */
body, h1, p, ul, li, a, button, input, table, tr, td {
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style: none;
    border: none;
    outline: none;
}

body {
    font-family: Arial, sans-serif;
    background-image: url('background1.jpg'); /* Adjust the path as necessary */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container {
    background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
    padding: 30px 50px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
    text-align: center;
    margin: 20px auto;
}

h2 {
    margin-bottom: 20px;
    font-size: 2em;
    color: #003366; /* Dark blue */
}

table {
    width: 100%;
    margin: 0 auto;
}

td {
    padding: 10px 0;
    text-align: left;
}

label {
    font-size: 1em;
    color: #333;
}

input[type="email"] {
    width: calc(100% - 20px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
    margin-left: 10px;
}

button[type="submit"] {
    background-color: #003366; /* Dark blue */
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background 0.3s;
    width: 100%;
}

button[type="submit"]:hover {
    background-color: #0059b3; /* Lighter blue */
}

.error {
    color: red;
    margin-top: 10px;
    font-size: 1em;
}

</style>
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
                        echo "<p class='error'>Failed to send OTP. Please try again.</p>";
                    }
                } else {
                    echo "<p class='error'>Invalid email address. Please enter a valid email.</p>";
                }
            }
        ?>
    </div>
</body>
</html>
