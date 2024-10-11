<?php 

include "../connect.php";
session_start();
$query="update tbl_user set role='Not Verified' where id=".$_SESSION["id"];
echo mysqli_query($con,$query);

?>