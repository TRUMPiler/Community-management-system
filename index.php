<?php
 session_start();
if (isset($_SESSION['Email']) || isset($_SESSION['user_id'])) {
    header("Location: login.php");
    // exit();
}
?>
<!--  <?php 
//include 'header.php';
 ?>
    <main>
        <div class="container">
            
            
        </div>
    </main> -->
<!-- <?php 
//include 'footer.php'; ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uma Foundation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Uma Foundation</h1>
            </div>
            <nav>
                <ul>
                    <li class="current"><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Registration</a></li>
                    <li><a href="event.php">Events</a></li>
                    <li><a href="scholarships.php">Scholarships</a></li>
                    <li><a href="hall_booking.php">Hall Booking</a></li>
                    <li><a href="donations.php">Donations</a></li>
                    <li><input type="button" name="logout">LogOut</li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="showcase">
        <div class="container">
            <h1 style="color:orange;">Welcome to Uma Foundation</h1>
            <p>Supporting education and community services</p>
        </div>
    </section>

    <footer>
        <p>Uma Foundation, &copy; 2024</p>
    </footer>
</body>
</html>