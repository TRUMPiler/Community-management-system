<?php
    session_start();
        include 'connect.php';
        include 'change-password-db.php';

    if(empty($_SESSION['username']) & empty($_SESSION['password'])){
    //    header("Location:login.php");
}

?>
<!DocTYPE HTML>
<html>
    <head>
        <title> Change Password </title>
        <link rel="stylesheet" href="style2.css"> 
    </head>
    <body>
        <h1 align="center"> Change Password </h1>

        <form method="post">
            <table align="center">
                <?php
                    if(isset($_SESSION["msg"])){ 
                ?>
                <tr> 
                    <td colspan="2" align="center"> <?php echo $_SESSION["msg"]; ?> </td>
                </tr>
                <?php
                    unset($_SESSION["msg"]);
                    } 
                ?>

                <tr>
                    <td> New Password </td>
                    <td>
                        <input type="password" name="newpassword">
                    </td>
                </tr>

                <tr>
                    <td> Confirm Password </td>
                    <td>
                        <input type="password" name="confirmpassword">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="change" value="Change Password">
                    </td>
                </tr>

            </table>
        </form>
    </body>
</html>