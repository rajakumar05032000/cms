<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';
?>


<?php

$deptname = $_SESSION['deptname'];

$sql = "create table if not exists student_publication(id int auto_increment primary key,deptname varchar(100),
title varchar(100),
journal varchar(500),
count varchar(100),
guide varchar(500),
date varchar(500),
sname json,
srollno json )";

$result = mysqli_query($conn,$sql);

if (isset($_POST['submit'])) {

    
    $json = json_encode($_POST, JSON_FORCE_OBJECT);
    $data = json_decode($json);

    $students_name_json = json_encode($data->sname,JSON_FORCE_OBJECT);
    $students_roll_json = json_encode($data->srol,JSON_FORCE_OBJECT);

    $Title = $_POST['Title'];
    $Journal = $_POST['Journal'];
    $count = $_POST['count'];
    $Guide = $_POST['Guide'];
    $datepub = $_POST['datepub'];
    
    

    $sql = "insert into student_publication values(null,'$deptname','$Title','$Journal','$count','$Guide','$datepub','$students_name_json','$students_roll_json')";    
    $result = mysqli_query($conn,$sql);

}

?>


<h2 class="ms-3 mt-2"><b>Student Publication</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">

<form method="POST" action="" enctype="multipart/form-data">

<div class="row">
 <div class="col-md-3">
<label for="" class="form-label ">Title</label>
<input type="text " class="form-control" id="Title" name="Title">
</div>

 <div class="col-md-3">
<label for="Journal" class="form-label ">Journal</label>
<select  id="Journal" class="form-select" name="Journal">
<option selected="">Choose...</option>
<option value="IEEE ">IEEE</option> 
<option value="URE">URE</option>
<option value="CJJ">CJJ</option>
</select>
</div>

 <div class="col-md-2">
<label for="" class="form-label ">No. of. Students</label>
<input type="text " class="form-control" id="count" name="count">
</div>

 <div class="col-md-2">
<label for="" class="form-label ">Guide</label>
<input type="text " class="form-control" id="Guide" name="Guide">
</div>

<div class="col-md-2 pe-1">
<label for="date" class="form-label">Date</label>
<input type="date" class="form-control" id="date" name="datepub"></div>
</div>

<div class="row mt-3" id="roll"></div>


<button type="Submit" class="btn btn-primary btn-lg mb-4 mt-4 " name="submit">Submit</button>


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
      //  txt2 = txt + 'id="sname'+i+'" name="sname'+i+'"></div>'+rol+'id="srol'+i+'" name="srol'+i+'" </div>';
      txt2 = txt + 'id="sname[]'+'" name="sname[]'+'"></div>'+rol+'id="srol[]'+'" name="srol[]'+'" </div>';
    $("#roll").prepend(txt2);
   }
})
</script>