
<?php 
// session_start();
// include 'connect.php';

// $error = [];  // Initialize the error array

// // Check if the form is submitted
// if (isset($_POST['recover'])) {
//     $mode = $_GET['mode'];

//     switch ($mode) {
//         case 'enter_email':
//             $email = $_POST['email'];
//             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//                 $error[] = "Invalid email format";
//             } else{
//                 $otp = rand(100000, 999999);
//                 $_SESSION['otp'] = $otp;
//                 $_SESSION['email'] = $email;

//                 $subject = "Your OTP Code";
//                 $message = "Your OTP code is $otp";
//                 $headers = "From: umafoundation123@gmail.com";

//                 if (mail($email, $subject, $message, $headers)) {
//                     header('Location: forget.php?mode=enter_code');
//                     exit();
//                 } else {
//                     $error[] = "Failed to send OTP. Please try again.";
//                 }
//             }
//             break;
//         case 'enter_code':
//             $code = $_POST['code'];
//             if ($code != $_SESSION['otp']) {
//                 $error[] = "Invalid OTP code";
//             } else {
//                 header('Location: forget.php?mode=enter_password');
//                 exit();
//             }
//             break;
//         case 'enter_password':
//             $password = $_POST['password'];
//             $password2 = $_POST['password2'];
//             if ($password != $password2) {
//                 $error[] = "Passwords do not match";
//             } else {
//                 // Update password logic here
//                 // e.g., update the password in the database
//                 echo "Password successfully updated!";
//                 // Clear session data
//                 session_unset();
//                 session_destroy();
//                 exit();
//             }
//             break;
//     }
// } else {
//     $mode = 'enter_email';  // Default mode
// }
?>

  

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php 
    // switch($mode){
    //     case 'enter_email':
    ?>
        <form action="forget.php?mode=enter_email" method="post">      
            <div class="container" id="recover">
            <h1 class="form-title">Recover Password</h1>
            <h3 class="form-title">Enter Your email below</h3>
            <span style="font-size: 12px;color:red;">
            <?php
                // foreach($error as $err){
                //     echo $err."<br>";
                // }
            ?>
            </span>
            <div class="input-box">
            <i class='bx bxl-gmail'></i>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <input type="submit" class="btn" value="Next" name="recover">
        </div>
    </form>
    <?php
        //     break;
        // case 'enter_code':
    ?>
        <form action="forget.php?mode=enter_code" method="post">
            <div class="container" id="recover">
            <h1 class="form-title">Recover Password</h1>
            <h3 class="form-title">Enter the code sent to your email</h3>
            <span style="font-size: 12px;color:red;">
            <?php
                // foreach($error as $err){
                //     echo $err."<br>";
                // }
            ?>
            </span>
            <div class="input-box">
            <i class='bx bxl-gmail'></i>
                <input type="textbox" name="code" placeholder="Enter your code" required>
            </div>
            <input type="submit" class="btn" value="Next" name="recover" style="float:right;">
            <a href="forget.php">
            <input type="button" value="Start Over">
            </a>
        </div>  
    </form>
    <?php
        //     break;
        // case 'enter_password':
   ?>
    <form action="forget.php?mode=enter_password" method="post">
            <div class="container" id="recover">
            <h1 class="form-title">Recover Password</h1>
            <h3 class="form-title">Enter your new password</h3>
            <span style="font-size: 12px;color:red;">
            <?php
                // foreach($error as $err){
                //     echo $err."<br>";
                // }
            ?>
            </span>
            <div class="input-box">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password2" placeholder="Retype password">
            </div>
            <input type="submit" class="btn" value="Next" name="recover">
        </div>
    </form>
<?php
    //         break;
    //     default:
    //         break;
    // }
    ?>
</body>
</html> -->
<?php 
session_start();


$error = [];  // Initialize the error array

// Check if the form is submitted
if (isset($_POST['recover'])) {
    $mode = $_GET['mode'];

    switch ($mode) {
        case 'enter_email':
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "Invalid email format";
            } else{
                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['email'] = $email;

                $subject = "Your OTP Code";
                $message = "Your OTP code is $otp";

                if (mail($email, $subject, $message)) {
                    header('Location: forget.php?mode=enter_code');
                    exit();
                } else {
                    $error[] = "Failed to send OTP. Please try again.";
                }
            }
            break;
        case 'enter_code':
            $code = $_POST['code'];
            if ($code != $_SESSION['otp']) {
                $error[] = "Invalid OTP code";
            } else {
                header('Location: forget.php?mode=enter_password');
                exit();
            }
            break;
        case 'enter_password':
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            if ($password != $password2) {
                $error[] = "Passwords do not match";
            } else {
                // Update password logic here
                // e.g., update the password in the database
                echo "Password successfully updated!";
                // Clear session data
                session_unset();
                session_destroy();
                exit();
            }
            break;
    }
} else {
    $mode = 'enter_email';  // Default mode
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php 
    switch($mode){
        case 'enter_email':
    ?>
        <form action="forget.php?mode=enter_email" method="post">      
            <div class="container" id="recover">
            <h1 class="form-title">Recover Password</h1>
            <h3 class="form-title">Enter Your email below</h3>
            <span style="font-size: 12px;color:red;">
            <?php
                foreach($error as $err){
                    echo $err."<br>";
                }
            ?>
            </span>
            <div class="input-box">
            <i class='bx bxl-gmail'></i>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <input type="submit" class="btn" value="Next" name="recover">
        </div>
    </form>
    <?php
            break;
        case 'enter_code':
    ?>
        <form action="forget.php?mode=enter_code" method="post">
            <div class="container" id="recover">
            <h1 class="form-title">Recover Password</h1>
            <h3 class="form-title">Enter the code sent to your email</h3>
            <span style="font-size: 12px;color:red;">
            <?php
                foreach($error as $err){
                    echo $err."<br>";
                }
            ?>
            </span>
            <div class="input-box">
            <i class='bx bxl-gmail'></i>
                <input type="textbox" name="code" placeholder="Enter your code" required>
            </div>
            <input type="submit" class="btn" value="Next" name="recover" style="float:right;">
            <a href="forget.php">
            <input type="button" value="Start Over">
            </a>
        </div>  
    </form>
    <?php
            break;
        case 'enter_password':
   ?>
    <form action="forget.php?mode=enter_password" method="post">
            <div class="container" id="recover">
            <h1 class="form-title">Recover Password</h1>
            <h3 class="form-title">Enter your new password</h3>
            <span style="font-size: 12px;color:red;">
            <?php
                foreach($error as $err){
                    echo $err."<br>";
                }
            ?>
            </span>
            <div class="input-box">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password2" placeholder="Retype password">
            </div>
            <input type="submit" class="btn" value="Next" name="recover">
        </div>
    </form>
<?php
            break;
        default:
            break;
    }
    ?>
</body>
</html>
