<?php
session_start();
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
        $city = $_POST["city"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $role = "not registered";
       
        $query = "select * from  tbl_user where Email ='" .$_POST['email']."' limit 1";
        $result2 = mysqli_query($conn, $query);
        if ($result2->num_rows > 0) 
         {   
          echo "user exists";
          exit();
         } 
        $allowTypes = array('pdf');
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "certificate/".$filename;
        move_uploaded_file($tempname, $folder);
        
        $fileType = pathinfo($folder, PATHINFO_EXTENSION);
       
        if (in_array($fileType, $allowTypes)){
        $query = "insert into tbl_user (name,username,gender,dob,contactno,address,email,password,caste_certificate,role,cityid) values ('$name','$uname','$gender','$dob',$contect,'$address','$email','". md5($pass) ."','$folder','$role',$city)";

        $q = mysqli_query($conn, $query);
        
            
        if ($q==true) {
            $query="select * from tbl_user where email='".$_POST["email"]."'";
            $result=mysqli_query($conn,$query);
            while($row=$result->fetch_assoc())
            {
                $_SESSION["id"]=$row["id"];
                $_SESSION["email"]=$_POST["email"];
                echo true;
            }
        } 
        else
        {
            echo false;
        }
        }
        else{
            echo 'Please Upload only PDF file for Certificate!';
          }

?>
