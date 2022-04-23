<?php
include 'db_conn.php';
$del_id=$_GET['id'];
error_reporting(0);

session_start();

$sql = "delete from education where faculty_code='$del_id'";
$result = mysqli_query($conn,$sql);

if($result)
{
    echo "<script>alert(' Deleted Successfully')</script>";
    header("Location: education_view.php");
}

?>