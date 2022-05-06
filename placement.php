<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';
?>

<?php

$deptname = $_SESSION['deptname'];

$sql = "create table if not exists placement(deptname varchar(100),
year varchar(100),
company_title varchar(500),
count varchar(100),
sname json,
srollno json )";

$result = mysqli_query($conn,$sql);

if (isset($_POST['submit'])) {

    
    $json = json_encode($_POST, JSON_FORCE_OBJECT);
    $data = json_decode($json);

    $students_name_json = json_encode($data->sname,JSON_FORCE_OBJECT);
    $students_roll_json = json_encode($data->srol,JSON_FORCE_OBJECT);

    $year = $_POST['year'];
    $company_title = $_POST['company_title'];
    $count = $_POST['count'];
    
    $sql = "insert into placement values('$deptname','$year','$company_title','$count','$students_name_json','$students_roll_json')";    
    $result = mysqli_query($conn,$sql);

}

?>


<div class="row mt-2">
<div class="col">
<h4 class="text-center">Placement Details</h4>
</div>
</div>

<form method="POST" action="" enctype="multipart/form-data">
<div class="row mt-3">
<div class="col-md-4">
 <label for="name" class="form-label">Year</label>
 <input type="text" class="form-control" name="year" id="datepicker" />
 </div>


 <div class="col-md-4">
<label for="company_title" class="form-label ">Company Title</label>
<input type="text " class="form-control" id="company_title" name="company_title">
</div>

    <div class="col-md-2">
    <label for="count" class="form-label ">No. of. Students</label>
    <input type="text " class="form-control" id="count" name="count">
    </div>
</div>


<div class="row mt-2" id="roll">

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
    //    txt2 = txt + 'id="sname'+i+'" name="sname'+i+'"></div>'+rol+'id="srol'+i+'" name="srol'+i+'" </div>';
    txt2 = txt + 'id="sname[]'+'" name="sname[]'+'"></div>'+rol+'id="srol[]'+'" name="srol[]'+'" </div>';
    $("#roll").prepend(txt2);
   }
})
</script>
