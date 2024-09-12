<?php 

session_start();
if(isset($_SESSION["email"]))
{
    if($_SESSION["email"]!="")
    {

    }
    else
    {
        echo "<script>alert('email has not been set please do it first1');</script>";
    }
}
else
{
    echo "<script>alert('email has not been set please do it first2');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="newpasswordform">
        Password:<input type="password" id="password" name="password"><br>
        Re-enter Password:<input type="password" id="newpassword" name="newpassword"><br>
        <input type="submit" value="submit">
    </form>
    <script>
        $(document).ready(function(){
            $("#newpasswordform").submit(function(event){
                event.preventDefault();
                if($("#password").val()==$("#newpassword").val())
                {
                    $.ajax({
                        url:"../Ajax_file/changepassword.php",
                        method:"POST",
                        data:{
                            email:"<?php echo $_SESSION["email"];?>",
                            password:$("#password").val()
                        },
                        success:function(response)
                        {   
                            if(response==true)
                            {
                                alert("you\'re password was changed succesfully");
                                window.location="index.php";
                            }
                            else
                            {
                                alert(response);
                            }
                        }
                    })
                }
                else
                {
                    alert("password not matched");
                }
            })
        })
    </script>
</body>
</html>