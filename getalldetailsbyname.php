<?php
include 'db_conn.php';
$name = $_GET['q'];
$sql = "SELECT * FROM staff_details WHERE name='$name'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)) {
    $deptname = $row['deptname'];
  $selection_category = $row['selection_category'];
	$gender = $row['gender'];
	$Date_of_joining = $row['date_of_joining'];
  $employee_id=$row['emp_id'];
  $name=$row['name'];
  $date_of_birth=$row['dob'];
  $bloodgroup=$row['blood_grp'];
  $designation=$row['designation'];
  $designation_n=$row['designation_n'];
  $grade=$row['grade'];
  $if_chair_related_to=$row['chair_related'];
  $profile_picture=$row['profile_pic_url'];
  
    $all_details = array("deptname"=>$deptname, "selection_category"=>$selection_category, "gender"=>$gender, "doj"=>$Date_of_joining,"emp_id"=>$employee_id,"name"=>$name,"dob"=>$date_of_birth,"bloodgrp"=>$bloodgroup,"designation"=>$designation,"designation_n"=>$designation_n,"grade"=>$grade,"chair"=>$if_chair_related_to,"profile_pic"=>$profile_picture);
}
echo json_encode($all_details);
?>