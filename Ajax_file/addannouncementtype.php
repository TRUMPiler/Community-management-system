<?php
session_start();

$announcement_status = $_POST["announcement_id"];
$announcementtype_name = $_POST["announcementtype_name"];

$conn = mysqli_connect("localhost","root","","project") or die("Connection Failed");

$sql = "insert into tbl_announcement_type (id,type_name) values ('$announcement_status','$announcementtype_name' )";

if(mysqli_query($conn,$sql)) {

    echo 1;
}
else
{
    echo 0;
}



?>
