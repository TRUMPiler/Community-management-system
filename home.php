
<!-- <?php
    
    // session_start();
    // include 'connect.php';
    
    //  //Check if user is logged in
    //  if (!empty($_SESSION['username']) & !empty($_SESSION['user_id'])) {
    //      header("Location: login.php");
    //    exit();
    //  }
    
?>  -->
<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
       <title>Home page</title>
    </head>
    <body>
        <div style="text-align:center;padding:15%;">
            <p style="font: size 50px;font-weight:bold;"></p>
            hello
            
            <div>
                <button type="submit" a href="logout.php">logout</button>
            </div>
        </div>

    </body>
    </html>  -->
    <?php  
    
    // if(isset($_POST['logout'])) {
    //      // Destroy all sessions
    //     header("Location: login.php");
    //     exit();}
    ?>
   <?php
session_start();

// Check if user is logged in
if (empty($_SESSION['Email']) || empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
    <div style="text-align:center;padding:15%;">
        <p>Welcome, <?php echo $_SESSION['Email']; ?></p>
        <div>
            <form action="logout.php" method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
    </div>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uma Foundation Home</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f0f2f5;
            background-size: cover;
            background-position: center;
        }

        .container {
            width: 420px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 30px 40px;
            color: #3d3535;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #333;
        }

        .description {
            font-size: 1.2rem;
            margin: 20px 0;
            color: #555;
        }

        .links {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 0 2rem;
            margin-top: 0.9rem;
            font-weight: bold;
        }

        .links button {
            color: orange;
            border: none;
            background-color: transparent;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            margin: 5px;
        }

        .links button:hover {
            text-decoration: underline;
            color: #007bff;
        }

        .btn {
            font-size: 1.1rem;
            padding: 8px 0;
            border-radius: 5px;
            outline: none;
            border: none;
            width: 100%;
            background: orange;
            color: white;
            cursor: pointer;
            transition: 0.9s;
            margin-top: 20px;
        }

        .btn:hover {
            background: #07001f;
        }

        .register-link {
            font-size: 14.5px;
            text-align: center;
            margin-top: 20px;
            margin: 20px 0 15px;
            color: #333;
        }

        .register-link p a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Uma Foundation</h1>
        <p class="description">Supporting handicap children with love and care.</p>
        <div class="links">
            <button onclick="window.location.href='login.php'">Login</button>
            <button onclick="window.location.href='register.php'">Register</button>
            <button onclick="window.location.href='events.php'">Events</button>
            <button onclick="window.location.href='scholarships.php'">Scholarships</button>
            <button onclick="window.location.href='hall_booking.php'">Hall Booking</button>
            <button onclick="window.location.href='donations.php'">Donations</button>
        </div>
        <button class="btn" onclick="window.location.href='donate.php'">Donate Now</button>
        <div>
            
        <button class="btn" onclick="window.location.href='logout.php'">log out</button>
            
        </div>
        <div class="register-link">
            <p>New to Uma Foundation? <a href="register.php">Create an account</a></p>
        </div>
    </div>
</body>
</html>
