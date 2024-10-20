<?php
session_start();
include "../connect.php";


  
    $sql = "insert into tbl_donation (price,name,date,status,transaction_id,typeid) values ('".$_SESSION["price"]."','".$_POST["name"]."','".$_POST["date"]."',1,'".$_POST["transaction_id"]."','".$_POST["typeid"]."')";


    if (mysqli_query($con, $sql)) {
        echo true;
    } else {
        echo "Error inserting record: " . mysqli_error($con);
    }

?>