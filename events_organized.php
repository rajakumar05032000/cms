<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';
?>


<?php
if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Web Incharge') {
    header("Location: new_login.php");
  }


$sql = "create table if not exists events_organized(id int auto_increment primary key,deptname varchar(100),
type_ varchar(100),
description varchar(500),
title varchar(200),
from_ varchar(750),
to_ varchar(1000),
gallery varchar(500) )";

$result = mysqli_query($conn,$sql);

if (isset($_POST['submit'])) {

    $deptname = $_SESSION['deptname'];
    $type = $_POST['Type'];
    $description = $_POST['Description'];
    $from = $_POST['From'];
    $to = $_POST['To'];
    $title = $_POST['Title'];

    $gallery="";
    $total = count($_FILES['img']['name']);
    for( $i=0 ; $i < $total ; $i++ ) {
        $tmpFilePath = $_FILES['img']['tmp_name'][$i];
        $rfile_name = 'event_'.$deptname.'-'.date('m-d-Y-His').$_FILES["img"]['name'][$i];
        $file_name = $_FILES["img"]['name'][$i];
        $gallery = $gallery."$rfile_name".",";
        move_uploaded_file($tmpFilePath, "images/".$deptname."/Events_organized"."/".$rfile_name);
    }
    $sql = "insert into events_organized values(null,'$deptname','$type','$description','$title','$from','$to','$gallery')";    
    $result = mysqli_query($conn,$sql);

    if ($result) {
        $login_tym = $_SESSION["login_tym"] ;
        $emp_id =  $_SESSION["empid"] ;
        
        $sql = "select * from log_details where login_tym ='$login_tym' and user ='$emp_id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $action = $row['action'];
        $form = $row['form'];

        $t1 = $action.",inserted event_details";
        $t2 = $form.", event_details";


        $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and user ='$emp_id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('Event details inserted Successfully')</script>";
        } 
  else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
}

?>


<h2 class="ms-3 mt-3" ><b>Events Organized</b></h2>

 <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">
<form method="POST" action="" enctype="multipart/form-data">
<div class="row mt-3">
     <div class="col-md-2">
    <label for="Type" class="form-label ">Type</label>
    <select  id="Type" class="form-select" name="Type">
    <option selected="">Choose...</option>
    <option value="Conference">Conference</option> 
    <option value="Seminar">Seminar</option>
    <option value="Workshop">Workshop</option>
    </select>
    </div>

     <div class="col-md-3">
    <label for="Title" class="form-label ">Title</label>
    <input type="text " class="form-control" id="Title" name="Title">
    </div>

     <div class="col-md-3">
    <label for="Description" class="form-label ">Description</label>
    <input type="text " class="form-control" id="Description" name="Description">
    </div>

    <div class="col-md-2 pe-1">
    <label for="From" class="form-label">From</label>
    <input type="date" class="form-control" id="From" name="From"></div>

    <div class="col-md-2 pe-1">
    <label for="To" class="form-label">To</label>
    <input type="date" class="form-control" id="To" name="To"></div>
</div>

<div class="row mt-3">
    <div class="col-md-3">
    <label for="Gallery" class="form-label">Gallery</label>
    <input type="file" class="form-control" id="img" name="img[]" multiple=""></div>
</div>


    
    <button type="Submit" class="btn btn-primary btn-lg mb-3 mt-5 " name="submit">Submit</button>
 

</form>




<?php
include 'endtags.php';
?>