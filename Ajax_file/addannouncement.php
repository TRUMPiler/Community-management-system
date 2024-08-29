<?php
session_start();
include "../connect.php";

// $sql = "insert into tbl_announcement (title, type_id, description, declaration_date, from_date, to_date, form) 
// values ('$title', '$type', '$description', '$declaration_date', '$from_date', '$to_date', '$form')";


$allowTypes = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'GIF', 'PNG', 'JPEG');
$filename = $_FILES["Image"]["name"];
$tempname = $_FILES["Image"]["tmp_name"];
$folder = "C:/xampp/htdocs/Community-management-system/image/" . $filename;
move_uploaded_file($tempname, $folder);

$fileType = pathinfo($folder, PATHINFO_EXTENSION);

if (in_array($fileType, $allowTypes)) {
    $sql = "insert into tbl_announcement (title, type_id, description, declaration_date, from_date, to_date, form,image,status) values('".$_POST["title"]."','".$_POST["type"]."','".$_POST["description"]."','".$_POST["declaration_date"]."','".$_POST["from_date"]."','".$_POST['to_date']."','".$_POST['form']."','image/".$filename."',1)";


    if (mysqli_query($con, $sql)) {
        echo true;
    } else {
        echo "Error inserting record: " . mysqli_error($con);
    }
}
else
{
    echo "not allowed";
}
