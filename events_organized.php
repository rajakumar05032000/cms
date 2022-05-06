<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';
?>


<?php



$sql = "create table if not exists events_organized(id int auto_increment primary key,deptname varchar(100),
type_ varchar(100),
description varchar(500),
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

    $gallery="";
    $total = count($_FILES['img']['name']);
    for( $i=0 ; $i < $total ; $i++ ) {
        $tmpFilePath = $_FILES['img']['tmp_name'][$i];
        $rfile_name = 'event_'.$deptname.'-'.date('m-d-Y-His').$_FILES["img"]['name'][$i];
        $file_name = $_FILES["img"]['name'][$i];
        $gallery = $gallery."$rfile_name".",";
        move_uploaded_file($tmpFilePath, "images/".$rfile_name);
    }
    $sql = "insert into events_organized values(null,'$deptname','$type','$description','$from','$to','$gallery')";    
    $result = mysqli_query($conn,$sql);

}

?>

 <div class="row mt-2">
<div class="col">
<h4 class="text-center">Events Organized</h4>
</div>
</div>

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

<div class="row mt-2">
    <div class="col-md-12 text-center">
    <button type="Submit" class="btn btn-primary btn-lg mb-4 " name="submit">Submit</button>
    </div>
</div>

</form>




<?php
include 'endtags.php';
?>