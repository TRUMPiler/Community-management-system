<?php
session_start(); 
    include "../connect.php";

$query="insert into tbl_announcement(title,status,type_id,description,declaration_ Date,From_Date,To_Date,Form) values ('$title', '$status', '$type_id', '$Description', '$Declaration', '$Date', '$Form_Date', '$To_Date', )";

?>