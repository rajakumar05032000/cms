<?php
session_start(); 
$del_id=$_GET['id'];

include 'db_conn.php';

$sql = "delete from jobrole where id='$del_id'";
$result = mysqli_query($conn,$sql);

if($result)
{
    echo "<script>alert('Job Role Details Deleted Successfully')</script>";
    header("Location: viewform_jobrole.php");
}

?>