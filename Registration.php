<?php
session_start();
if(!empty($_SESSION['username']) & !empty($_SESSION['password'])){
   header("Location:login.php");
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration </title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .input-group {
            font-size: 40px;
        }

        .input-group input {
            border: 1px solid black;
        }

        th,
        td {
            padding-top: 4px;
            padding-bottom: 6px;
            padding-left: 6px;
            padding-right: 6px;
        }

        /* body {
            background-color: white;
        } */
        .error {
            color: red;
            display: none;
        }
    </style>  
</head>

<body>
<header>
        <div class="container">
            <div id="branding">
                <h1>Uma Foundation</h1>
            </div>
        </div>
</header>
    <center>
        <h1 class="form_title"> Registration </h1>
        <form  id="user-form" enctype="multipart/form-data" novalidate>
            <table>
                <tr>
                    <div class="input-group">
                        <th> Name: </th>
                        <td> <i class="fas fa-user"></i> <input type="text" name="name" id="name" pattern="[A-Za-z]*" minlength="2" placeholder="Name" title="Please Enter only Alphabet character!" required> </td>
                        <div id="name-error" class="error"> Invalid name. Please use letters only. and give proper spaces[firstname,middlename,lastname] </div> 
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> User Name: </th>
                        <td> <i class="fas fa-user"></i> <input type="text" name="uname" id="uname" minlength="2" placeholder="user Name" required> </td>
                        <div id="uname-error" class="error"> Invalid  user name. </div> 
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Gender: </th>
                        <td> <i class="fas fa-venus-mars"></i>
                            <input type="radio" name="gender" value="M" checked=""> Male
                            <input type="radio" name="gender" value="F"> Female
                            <input type="radio" name="gender" value="O"> Other
                        </td>
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Date of Birth: </th>
                        <td> <i class="fas fa-calendar"></i> <input type="date" id="dob" name="dob" required title="Please Select Date of Birth!"> </td>
                        <div id="dob-error" class="error">Invalid date of birth.</div>
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Contact Number: </th>
                        <td> <i class="fas fa-envelope"></i> <input type="tel" class="form-control" id="cno" name="cno" maxlength="10" minlength="10" pattern="[0-9]{10}" required title="Please Enter only 10 digit Number!"> </td>
                        <div id="phone-error" class="error">Invalid phone number. Please use 10 digits.</div>
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Address: </th>
                        <td> <i class="fas fa-home"></i> <textarea id="address" name="address" rows="4" cols="20" minlength="5" required title="Please Enter your Proper Address!"></textarea> </td>
                        <div id="address-error" class="error">Please enter your address.</div>
                    </div>
                </tr>
                
                <tr>
                    <div class="input-group">
                        <th> Email: </th>
                        <td> <i class="fas fa-envelope"></i> <input type="email" name="email" id="email" size="21" placeholder="xyz12@gmail.com" pattern="[a-z0-9._%+\-]+@[a-z0-z0-9.\-]+\.[a-z]{2,}$" required title="Please Enter proper character, special character and digit!"> </td>
                        <div id="email-error" class="error">Invalid email address.</div>
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Password: </th>
                        <div id="password-error" class="error">Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.</div>
                        <td> <i class="fas fa-user"></i> <input type="password" id="password" name="password" required></label>
                    </div>
                </tr>

                <!-- <tr>
                    <div class="input-group">
                        <th> Confirm Password: </th>
                        <div id="password-error" class="error">Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.</div>

                        <td> <i class="fas fa-user"></i> <input type="password" id="pass" name="pass" size="21" placeholder="Password" maxlength="8" minlength="8" required title="Please Enter correct password!"> </td>
                    </div>
                </tr>  -->
                
                <tr>
                    <th> Caste Certificate </th>
                    <td> <input type="file" id="file" name="file" required title="Upload Caste Certificate!"> </td>
                </tr>

                <tr>
                    <td> </td>
                    <td> <input type="submit" name="submit" value="Submit" required> <input type="reset" name="reset" value="Reset" required> </td>
                </tr>

            </table>
        </form>
    </center>

    <!-- <script>
        var todayDate = new Date();
        var month = todayDate.getMonth() + 1;
        var year = todayDate.getUTCFullYear();
        var tdate = todayDate.getDate();
        if (month < 10) {
            month = "0" + month; //'0' + 4 = 04
        }
        if (tdate < 10) {
            tdate = "0" + tdate;
        }
        var maxDate = year + "-" + month + "-" + tdate;
        document.getElementById("dob").setAttribute("max", maxDate)
        console.log(maxDate);
    </script> -->
    <script>
    $(document).ready(function(){
       
    
    $('#user-form').on('submit', function(e){
        e.preventDefault();
        let valid = true;

        const nameRegex = /^[a-zA-Z]+(\s[a-zA-Z]+){1,2}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^\d{10}$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        const unameRegex = /^([a-zA-Z]){2,}$/;
        const address = $('#address').val().trim();
        
        const name = $('#name').val();
        const email = $('#email').val();
        const phone = $('#cno').val();
        const dob = $('#dob').val();
        const password = $('#password').val();
        const uname = $('#uname').val();
        const file = $('#file').val();
        const birthDate = new Date(dob);
                const today = new Date();
                var age = today.getFullYear() - birthDate.getFullYear();
                const m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

                if (age < 1) {
                    $('#dob-error').show();
                    valid = false;
                } else {
                    $('#dob-error').hide();
                }

        if (!nameRegex.test(name)) {
            $('#name-error').show();
            valid = false;
        } else {
            $('#name-error').hide();
        }
        if (!passwordRegex.test(password)) {
            $('#password-error').show();
            valid = false;
        } else {
            $('#password-error').hide();
        }
        if (!unameRegex.test(uname)) {
            $('#uname-error').show();
            valid = false;
        } else {
            $('#uname-error').hide();
        }
        if (!emailRegex.test(email)) {
            $('#email-error').show();
            valid = false;
        } else {
            $('#email-error').hide();
        }

        if (!phoneRegex.test(phone)) {
            $('#phone-error').show();
            valid = false;
        } else {
            $('#phone-error').hide();
        }
        if (!address) {
            $('#address-error').show();
            valid = false;
        } else {
            $('#address-error').hide();
        }
        const formData = new FormData(this);
        if (valid) {
            $.ajax({
                url: 'Register_Member.php',
                method: 'POST',
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    if(response==true)
                    {
                        alert("User Registeration successfull");
                        window.location='login.php';
                    }
                    else
                    {
                        alert("error:"+response)
                    }
                },
                error: function(error) {
                    alert('There was an error submitting the form.');
                }
            });
        }
    });
});
</script>
<footer>
        <p>Uma Foundation, &copy; 2024</p>
</footer>

</body>
</html>
