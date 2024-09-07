

<?php
session_start();
if(!empty($_SESSION['username']) & !empty($_SESSION['password'])){
   header('Location:login.php');
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
        
        .autocomplete-suggestion {
            padding: 10px;
            cursor: pointer;
            background-color: white;
        }

        .autocomplete-suggestion:hover {
            background-color: #f0f0f0;
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
                        <td> <i class="fas fa-user"></i> <input type="text" name="name" id="name" pattern="[A-Za-z]*" minlength="2" placeholder="Name" title="Please Enter only Alphabet character!" required><div id="name-error" class="error"> Invalid name. Please use letters only. and give proper spaces[firstname,middlename,lastname] </div>  </td>
                        
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> User Name: </th>
                        <td> <i class="fas fa-user"></i> <input type="text" name="uname" id="uname" minlength="2" placeholder="user Name" required> <div id="uname-error" class="error"> Invalid  user name. </div></td>
                         
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Gender: </th>
                        <td> <i class="fas fa-venus-mars"></i>
                            <input type="radio" name="gender" value="M" checked> Male
                            <input type="radio" name="gender" value="F"> Female
                            <input type="radio" name="gender" value="O"> Other
                        </td>
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Date of Birth: </th>
                        <td> <i class="fas fa-calendar"></i> <input type="date" id="dob" name="dob" required title="Please Select Date of Birth!">  <div id="dob-error" class="error">Invalid date of birth.</div></td>
                       
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Contact Number: </th>
                        <td> <i class="fas fa-envelope"></i> <input type="tel" class="form-control" id="cno" name="cno" maxlength="10" minlength="10" pattern="[0-9]{10}" required title="Please Enter only 10 digit Number!"><div id="phone-error" class="error">Invalid phone number. Please use 10 digits.</div> </td>
                        
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Address: </th>
                        <td> <i class="fas fa-home"></i> <textarea id="address" name="address" rows="4" cols="20" minlength="5" required title="Please Enter your Proper Address!"></textarea><div id="address-error" class="error">Please enter your address.</div><div id="suggestions" class="autocomplete-suggestions"></div> </td>
                            
                    </div>
                    
                </tr>
                
                <tr>
                    <div class="input-group">
                        <th> City: </th>
                        <td> <i class="fas fa-user"></i> <select name="city" id="city">
                            <?php 
                            include "connect.php";
                            $query="select * from tbl_city";
                            $result=mysqli_query($con,$query);
                            if($result->num_rows>0)
                            {
                                while($row=$result->fetch_assoc())
                                {
                                    ?>
                                    <option value=<?php echo $row["id"];?>><?php echo $row["name"]; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select><div id="name-error" class="error"> Please enter city. </div>  </td>
                        
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Email: </th>
                        <td> <i class="fas fa-envelope"></i> <input type="email" name="email" id="email" size="21" placeholder="xyz12@gmail.com" pattern="[a-z0-9._%+\-]+@[a-z0-z0-9.\-]+\.[a-z]{2,}$" required title="Please Enter proper character, special character and digit!"> <div id="email-error" class="error">Invalid email address.</div> </td>
                       
                    </div>
                </tr>

                <tr>
                    <div class="input-group">
                        <th> Password: </th>
                        <td> <i class="fas fa-user"></i> <input type="password" id="password" name="password" required>  <div id="password-error" class="error">Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.</div> </>
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
                    <td> <input type="file" id="file" name="file" required title="Upload Caste Certificate!"> <div id="file-error" class="error">Enter only pdf.</div></td>
                    
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
        if(!file)
        {
            $('#file-error').show();
        }
        else
        {
            $('#file-error').hide();
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
                        window.location='registrationotp.php';
                    }
                    else
                    {
                    if(response=="user exists")
                        {
                            alert("User already exists");
                        }
                    else
                    {
                        
                        if(response=="Please Upload only PDF file for Certificate!")
                        {
                            $('#file-error').show();
                        }
                        else
                        {
                            alert("error:"+response);
                        }
                    }
                }
            }
            });
        }
    });
});
</script>
<script>
     function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        const fetchSuggestions = debounce(function(input) {
            if (input.length < 3) {
                document.getElementById('suggestions').innerHTML = '';
                return;
            }
            const location = '23.204547904342565, 70.87135416153141';//23.204547904342565, 70.87135416153141
            const apiKey = 'PEDy9RDQZovqNa0v5z43MovpPUOQNBeXE2RiVdAg';
            const url = `https://api.olamaps.io/places/v1/autocomplete?location=${location}&input=${input}&api_key=${apiKey}`;

            fetch(url, {
                    headers: {
                        'X-Request-Id': 'your-request-id'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('API Response:', data);
                    const suggestionsDiv = document.getElementById('suggestions');
                    suggestionsDiv.innerHTML = '';
                    if (data.predictions && data.predictions.length > 0) {
                        data.predictions.forEach(prediction => {
                            const suggestionDiv = document.createElement('div');
                            suggestionDiv.className = 'autocomplete-suggestion';
                            suggestionDiv.textContent = prediction.description; // Use 'description' property
                            suggestionDiv.addEventListener('click', () => {
                                const {
                                    lat,
                                    lng
                                } = prediction.geometry.location;
                                callcity(lat,lng);
                                document.getElementById('address').value = prediction.description; // Use 'description' property
                                suggestionsDiv.innerHTML = '';
                            });
                            suggestionsDiv.appendChild(suggestionDiv);
                        });
                    } else {
                        console.error('No predictions found in the response');
                    }
                })
                .catch(error => console.error('Error fetching autocomplete suggestions:', error));
        }, 300);

        document.getElementById('address').addEventListener('input', function() {
            fetchSuggestions(this.value);
        });
        
        function callcity(lat, log) {
            var count = 0;
            // const location = '19.265980587014074,72.96698942923868';
            const apiKey = 'PEDy9RDQZovqNa0v5z43MovpPUOQNBeXE2RiVdAg';
            const url = `https://api.olamaps.io/places/v1/reverse-geocode?latlng=${lat}%2C${log}&api_key=${apiKey}`;

            fetch(url, {
                    headers: {
                        'X-Request-Id': 'your-request-id'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // if (getstate(data) == false) {
                    //     alert("The address should belong to Gujrat only");
                    //     return;
                    // }
                    getcity(data);
                    console.log(count++);
                });
        }
        function getstate(apiResponse) {
            var count = 0;
            var results = apiResponse.results;
            var sublocalities = new Set(); 

            for (let i = 0; i < results.length; i++) {
                const addressComponents = results[i].address_components;
                for (let j = 0; j < addressComponents.length; j++) {
                    if (addressComponents[j].types.includes("administrative_area_level_1")) {
                        const locality = addressComponents[j].long_name;
                        if (locality === "GUJARAT") {

                            return true;
                        } else {
                            document.getElementById('address').value = '';
                            return false;
                        }
                    }
                }
            }
            alert(`No match found for sub-locality please choose manually`);
            return;
        }
        function getcity(apiResponse) {
            var count = 0;
            var results = apiResponse.results;
            var sublocalities = new Set(); // Use a set to track unique sublocalities

            for (let i = 0; i < results.length; i++) {
                const addressComponents = results[i].address_components;
                for (let j = 0; j < addressComponents.length; j++) {
                    if (addressComponents[j].types.includes("locality")) {
                        const sublocality = addressComponents[j].long_name;
                        if (!sublocalities.has(sublocality)) {
                            sublocalities.add(sublocality);
                            console.log(sublocality);
                            if (matchAreaWithSublocality(sublocality) === "ok") {
                                console.log("done");
                                return;
                            } else {

                            }
                        }
                    }
                }
            }
            alert(`No match found for sub-locality please choose manually`);
            return null;
        }
        function matchAreaWithSublocality(sublocalityName) {
            const areaSelect = document.getElementById('city');
            const options = areaSelect.options;

            for (let i = 0; i < options.length; i++) {
                if (options[i].text.toLowerCase() === sublocalityName.toLowerCase()) {
                    areaSelect.value = options[i].value;
                    console.log(`Matched area: ${options[i].text} with sub-locality: ${sublocalityName}`);

                    return "ok";
                }
            }

            return null;
        }
</script>
<?php
    // if(isset($_SESSION['submit'])){
        
    //     header('location: index.php');
    // }

?>
<footer>
        <p>Uma Foundation, &copy; 2024</p>
</footer>

</body>
</html>
