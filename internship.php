<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';
?>

<?php

$deptname = $_SESSION['deptname'];

$sql = "create table if not exists internship(id int auto_increment primary key,deptname varchar(100),
batch varchar(100),
description varchar(500),
type varchar(100),
count varchar(100),
img varchar(500),
pdf varchar(500),
sname json,
srollno json )";

$result = mysqli_query($conn,$sql);

if (isset($_POST['submit'])) {

    
    $json = json_encode($_POST, JSON_FORCE_OBJECT);
    $data = json_decode($json);

    $students_name_json = json_encode($data->sname,JSON_FORCE_OBJECT);
    $students_roll_json = json_encode($data->srol,JSON_FORCE_OBJECT);

    $batch = $_POST['batch'];
    $description = $_POST['Description'];
    $type = $_POST['type'];
    $count = $_POST['count'];
    
    $tmpFilePath = $_FILES['image']['tmp_name'];
    $rfile_name_img = 'internsip_'.$deptname.'-'.date('m-d-Y-His').$_FILES["image"]['name'];
    move_uploaded_file($tmpFilePath, "images/".$rfile_name_img);

    $tmpFilePath = $_FILES['pdf']['tmp_name'];
    $rfile_name_pdf = 'internsip_'.$deptname.'-'.date('m-d-Y-His').$_FILES["image"]['name'];
    move_uploaded_file($tmpFilePath, "images/".$rfile_name_pdf);

    $sql = "insert into internship values(null,'$deptname','$batch','$description','$type','$count','$rfile_name_img','$rfile_name_pdf','$students_name_json','$students_roll_json')";    
    $result = mysqli_query($conn,$sql);

}

?>


<div class="row mt-2">
<div class="col">
    <h4 class="text-center">Internship</h4>
</div>   
</div>

<form method="POST" action="" enctype="multipart/form-data">
<div class="row mt-3">

<div class="col-md-2">
    <label for="name" class="form-label">Batch</label>
    <input type="text" class="form-control" name="batch" id="datepicker" />
</div>

 <div class="col-md-3">
<label for="Description" class="form-label ">Description</label>
<input type="text " class="form-control" id="Description" name="Description">
</div>


<div class="col-md-3">
<label for="name" class="form-label">Image</label>
<input type="file" class="form-control" id="image" name="image">
</div>

<div class="col-md-3">
<label for="name" class="form-label">Upload PDF</label>
<input type="file" class="form-control" id="pdf" name="pdf"></div>

</div>

<div class="row mt-3">
     <div class="col-md-3">
    <label for="name" class="form-label ">Type</label>
    <select  id="type" class="form-select" name="type">
    <option selected="">Choose...</option>
    <option value="Internsip">Internsip</option> 
    <option value="Industrial Visit">Industrial Visit</option>
    </select>
    </div>

     <div class="col-md-2">
    <label for="count" class="form-label ">No. of. Students</label>
    <input type="text " class="form-control" id="count" name="count">
    </div>
</div>

<div class="row mt-5" id="roll">

</div>

<div class="row mt-4">
<div class="col-md-12 text-center">
<button type="Submit" class="btn btn-primary btn-lg mb-4 " name="submit">Submit</button>
</div>
</div>

</form>


<?php
include 'endtags.php';
?>



<script>
$("#count").on('change',()=>{
   var a = document.getElementById("count").value;
   var txt = '<div class="row mt-3 "><div class="col-md-3"><label for="" class="form-label ">Name</label><input type="text " class="form-control"'
   var rol = '<div class="col-md-3"><label for="" class="form-label ">Roll no</label><input type="text " class="form-control"'
   for(i=a;i>0;i--)
   { 
       //txt2 = txt + 'id="sname'+i+'" name="sname'+i+'"></div>'+rol+'id="srol'+i+'" name="srol'+i+'" </div>';
       txt2 = txt + 'id="sname[]'+'" name="sname[]'+'"></div>'+rol+'id="srol[]'+'" name="srol[]'+'" </div>';
    $("#roll").prepend(txt2);
   }
})
</script>

