<?php
session_start();


include "../connect.php";

if ( isset($_POST['submit'])) {
    
    
    $title = $_POST['title'];
    $id =$_POST['id'];
    $typename=$_POST['type_name'];
    $description=$_POST['description'];
    $declaration_date=$_POST['declaration_date'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $form=$_POST['form'];

  // $query = "select a.id,a.title,a.status,at.type_name,a.description,a.declaration_date,a.from_date,a.to_date,a.form from tbl_announcement a join  tbl_announcement_type at on a.type_id=at.id";
    $sql = "update tbl_announcement set title='$title' ,type_id='$typename' ,description='$description' , declaration_date='$declaration_date' , from_date='$from_date' ,to_date ='$to_date' ,form ='$form' where id='$id'";


    if (mysqli_query($con, $sql)) {
        echo true;
    } else {
        echo "Error inserting record: " . mysqli_error($con);
    }
    
} else {
    echo "Required fields are missing.";
}
?>