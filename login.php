<?php
 session_start();
include 'connect.php';

// Check if user is already logged in
if (!empty($_SESSION['email']) && !empty($_SESSION['pass'])) {
    header("Location: index.php");
    exit();
}


if (isset($_POST["login"])) {

    $email1=$_POST['email'];
    $password=$_POST['pass'];    

    if (!empty($email1) && !empty($password)) {
        
        $email="";
        $pass="";
        $sql = "SELECT Email,Password FROM user_table WHERE Email='".$email1."' AND PASSWORD='".md5($password)."' limit 1";
        $result=mysqli_query($con,$sql);
            
        if ($result->num_rows>0) 
        {   

            while($row = $result->fetch_array()) 
            { 
                $_SESSION["email"]=$row[0];
                $_SESSION["pass"]=$row[1];
                echo "<script>alert('Login is Successfull')</script>";
            }
            
 
    
    }
    else
    {
        echo "<script>alert('".md5($password)."')</script>";
        echo "<script>alert('Login is unSuccessfull')</script>";
    }
}
}



// session_start();
// include 'connect.php';

// // Check if user is already logged in
// if (!empty($_SESSION['email']) && !empty($_SESSION['user_id'])) {
//     header("Location: index.php");
//     exit();
// }

// $error_message = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = $_POST['email'];
//     $pass = $_POST['password'];

//     if (!empty($email) && !empty($pass)) {
//         // Sanitize input
//         $email = mysqli_real_escape_string($con, $email);

//         $sql = "SELECT * FROM user_table WHERE Email='$email'";
//         $result = mysqli_query($con, $sql);

//         if (mysqli_num_rows($result) == 1) {
//             $row = mysqli_fetch_assoc($result);
//             //if (password_verify($pass, $row['Password'])) {
//                 $_SESSION['email'] = $row['Email'];
//                 $_SESSION['user_id'] = $row['user_id'];
//                 header("Location: index.php");
//                 exit();
//             } else {
//                 $error_message = "Invalid username or password!";
//             }
//         } else {
//             $error_message = "Invalid username or password!";
//         }
//     } else {
//         $error_message = "All fields are required!";
//     }
// //}

// mysqli_close($con);
// ?>


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
    <form method="post" action="#">
        <div class="container" id="login">

            <h1 class="form-title">Log In</h1>

            <div class="input-box">
            <i class='bx bxl-gmail'></i>
                <input type="email" name="email" placeholder="abc12@gmail.com" required>
            </div>
            <div class="input-box">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="pass" placeholder="Password" required>
            </div>

            <p class="recover">
                <a href="sendotp.php">Recover Password</a>
                <input type="submit" class="btn" value="Log in" name="login">
            </p>
            <div class="recover1">
                <p>Don't have an account yet?</p>
                <a href="register.php">Register</a>
            </div>
        </div>
    </form>


    <!-- <?php
            //    session_start();

            //    // Check if user is already logged in
            //    if (!empty($_SESSION['username']) & !empty($_SESSION['user_id'])) {
            //        header("Location: home.php");
            //        exit();
            //    }
            //     include 'connect.php';

            //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //         $uname = $_POST['username'];
            //         $pass = $_POST['password'];

            //         // Sanitize input data (optional step)
            //         // function validate($data){
            //         //     $data = trim($data);
            //         //     $data = stripslashes($data);
            //         //     $data = htmlspecialchars($data);
            //         //     return $data;
            //         // }
            //         // $uname = validate($_POST['username']);
            //         // $pass = validate($_POST['password']);


            //         if (!empty($uname) && !empty($pass)) {

            //             $sql = "SELECT * FROM usertable WHERE user_name='$uname' AND password='$pass'";
            //             $result = mysqli_query($con, $sql);


            //             if (mysqli_num_rows($result) > 0) {

            //                 session_start();
            //                 $row = mysqli_fetch_assoc($result);
            //                 $_SESSION['user_name'] = $row['user_name'];
            //                 $_SESSION['user_id'] = $row['user_id'];
            //                 header("Location: home.php");
            //                 exit();
            //             } else {

            //                 header("Location: login.php");
            //                 exit();
            //             }
            //         } else {

            //             header("Location: login.php");
            //             exit();
            //         }
            //     }
            //     mysqli_close($con); 
            //     /*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //         // Assuming your form sends 'username' and 'password' fields
            //         $username = $_POST['username'];
            //         $password = $_POST['password'];

            //         // Validate credentials (example, replace with your actual authentication logic)
            //         if ($username === 'admin' && $password === 'password') {
            //             // Authentication successful, set session variables
            //             $_SESSION['username'] = $username;

            //             // Redirect to home page
            //             header("Location: index.php");
            //             exit();
            //         } else {
            //             // Authentication failed, redirect back to login with error message if needed
            //             $error = "Invalid username or password";
            //         }
            //     }*/
            //     
            ?> -->

</body>

</html>