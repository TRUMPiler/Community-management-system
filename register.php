<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Uma Foundation</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li class="current"><a href="register.php">Registration</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="scholarships.php">Scholarships</a></li>
                    <li><a href="hall_booking.php">Hall Booking</a></li>
                    <li><a href="donations.php">Donations</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <form action="register.php" method="post">
            <div id="register">
                <h1 class="form-title">Register</h1>

                <div class="input-box">
                    <i class='bx bxl-gmail'></i>
                    <input type="email" name="email" placeholder="abc12@gmail.com" required>
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <input type="submit" class="btn" value="Register" name="register">
            </div>
        </form>
    </div>

    <footer>
        <p>Uma Foundation, &copy; 2024</p>
    </footer>
</body>
</html>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'connect.php';

        $email = $_POST['email'];
        $pass = $_POST['password'];

        if (!empty($email) && !empty($pass)) {
            // Sanitize input
            $email = mysqli_real_escape_string($con, $email);
            $pass = mysqli_real_escape_string($con, $pass);

            // Hash the password
            $hashed_pass = md5($pass);

            $sql = "INSERT INTO user_table (Email, password) VALUES ('$email', '$hashed_pass')";
            if (mysqli_query($con, $sql)) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            echo "All fields are required!";
        }

        mysqli_close($con);
    }
    ?>
</body>
</html>
