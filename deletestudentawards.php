<?php
session_start(); 
$del_id=$_GET['id'];

include 'db_conn.php';
if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Web Incharge') {
    header("Location: new_login.php");
  }
$sql = "delete from studentawards where id='$del_id'";
$result = mysqli_query($conn,$sql);

if($result)
{
    echo "<script>alert('Student Award Deleted Successfully')</script>";
    header("Location: viewform_studentawards.php");
}

?>