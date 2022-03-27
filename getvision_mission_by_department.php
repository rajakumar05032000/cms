<?php
include 'db_conn.php';
$name = $_GET['q'];
$sql = "SELECT * FROM departmentdata WHERE name='$name'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)) {
    $deptname = $row['name'];
  $year = $row['year'];
	$about = $row['about'];
	$vision = $row['vision'];
  $mission=$row['mision'];
  $hod_desk=$row['hod_desk'];
  $hod_image = $row["hod_image"];
  $flash = $row["flash"];
  
    $all_details = array("deptname"=>$deptname, "year"=>$year, "about"=>$about, "vision"=>$vision,"mission"=>$mission,"hod_desk"=>$hod_desk,"hod_image"=>$hod_image,"flash"=>$flash);
}
echo json_encode($all_details);
?>