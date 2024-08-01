<?php
    $username = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "project";
    $conn = mysqli_connect($username, $user, $pass, $dbname);
    
    if (!$conn) {
        die("Error!");
    }

    
        $name = $_POST["name"];
        $uname = $_POST["uname"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
        $contect = $_POST["cno"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $role = "Member";
        
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "certificate/".$filename;
        move_uploaded_file($tempname, $folder);

        $query = "insert into tbl_user (name,username,gender,dob,contactno,address,email,password,castecertificate,role) values ('$name','$uname','$gender','$dob',$contect,'$address','$email','". md5($pass) ."','$folder','$role');";

        $q = mysqli_query($conn, $query);

        if ($q>0) {
            echo true;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    

?>
