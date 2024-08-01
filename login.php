<?php
// session_start();
// include 'connect.php';
// if(!empty($_SESSION['username']) & !empty($_SESSION['password'])){
//     header("Location:index.php");
// }

// // if (isset($_SESSION['email'])) {
// //     echo "<script>alert('User is already logged in');window.location='index.php'</script>";
// // }
//  //if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {
// //     echo "<script>alert('User is already logged in');window.location='index.php'</script>";
// // }

// if (isset($_POST["login"])) {

//     $username = $_POST['username'];
//     $password = $_POST['pass'];  
//    // $role=$_POST['role'];
//     if (!empty($username) && !empty($password)) {
//         $sql = "SELECT username, password FROM user_table WHERE username='".$username."' AND password='".md5($password)."'LIMIT 1";
//         $result = mysqli_query($con, $sql);

//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_row()) {
//                 $_SESSION["username"] = $row['1'];
//                 $_SESSION["pass"] = $row['3'];
//                // $_SESSION["role"]=$row['4'];

//                 //if($row['role'] === 'CommitteeMajor'){
//                 echo "<script>alert('Login is successful');window.location='committee_manager.php'</script>";
//                 //}elseif($row['role'] === 'CommitteeMember') {
//                 //echo "<script>alert('Login is successful');window.location='committee_member.php'</script>";
//                 //}elseif($row['role'] === 'Member'){
//                   //  echo "<script>alert('Login is successful');window.location='member.php'</script>";
//                 //}
//                 //else{
//                   //  echo "<script>alert('Login is unsuccessful')</script>";
//                 //}
//             }
            
        
//         } else {
//             echo "<script>alert('Login is unsuccessful2')</script>";
//         }
//     }
    
// }
session_start();
include 'connect.php';

if (!empty($_SESSION['username']) && !empty($_SESSION['password'])) {
    header("Location:index.php");
}

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];  
    
    if (!empty($username) && !empty($password)) {
        //$sql = "SELECT uid, username, password, role FROM tbl_user WHERE username='$username' AND password='" . md5($password) . "' LIMIT 1";
        $sql = "SELECT uid, username, password, role FROM tbl_user WHERE username='$username' AND password='". md5($password) ."' LIMIT 1";
        $result = mysqli_query($con, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["username"] = $row['username'];
                $_SESSION["password"] = $row['password'];
                $_SESSION["role"] = $row['role'];

                if ($row['role'] === 'cMajor') {
                    echo "<script>alert('Login is successful');window.location='committee_major.php'</script>";
                } elseif ($row['role'] === 'cMember') {
                    echo "<script>alert('Login is successful');window.location='cm_request_list.php'</script>";
                } elseif ($row['role'] === 'Member') {
                    echo "<script>alert('Login is successful');window.location='member.php'</script>";
                } elseif ($row['role'] === 'admin') {
                    echo "<script>alert('Login is successful');window.location='admin.php'</script>";
                }else {
                    echo "<script>alert('Login is unsuccessful1')</script>";
                }
            }
        } else {
            echo "<script>alert('Login is unsuccessful')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    body, h1, p, ul, li, a, button, input, select {
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
        justify-content: center;
        align-items: center;
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
    }

    .form-title {
        margin-bottom: 20px;
        font-size: 2em;
        color: #003366; 
    }

    .input-box {
        position: relative;
        margin-bottom: 20px;
    }

    .input-box i {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #003366; 
    }

    .input-box input, .input-box select {
        width: calc(100% - 40px);
        padding: 10px 10px 10px 40px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1em;
    }

    .btn {
        background-color: #003366; 
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        transition: background 0.3s;
    }

    .btn:hover {
        background-color: #0059b3;
    }

    .recover {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }
</style>
<body>
    <form method="post" action="#">
        <div class="container" id="login">
            <h1 class="form-title">Log In</h1>
            <div class="input-box">
                <i class='bx bxs-user'></i>
                <input type="text" name="username" placeholder="username" required>
            </div>
            <div class="input-box">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="pass" placeholder="password" required>
            </div>
            <!-- <div class="input-box">
                <i class='bx bxs-user-check'></i>
                <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="CommitteeMajor">Committee Major</option>
                    <option value="CommitteeMember">Committee Member</option>
                    <option value="Member">Member</option>
            </div> -->
            <div>
            <p class="recover">
                <a href="sendotp.php">Recover password</a>
            </p>
            </div>
            <div>
            <p>
                <input type="submit" class="btn" value="Log in" name="login">
            </p>
            </div>
            <div class="recover1">
                <p>Don't have an account yet?</p>
                <a href="Registration.php">Register</a>
            </div>
        </div>
    </form>
</body>
</html>

