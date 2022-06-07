<?php
session_start(); 
$del_id=$_GET['id'];

include 'db_conn.php';

$sql = "delete from student_publication where id='$del_id'";
$result = mysqli_query($conn,$sql);

if($result)
{
    echo "<script>alert('Student Publication Deleted Successfully')</script>";
    header("Location: viewform_studentpublications.php");
}

?>