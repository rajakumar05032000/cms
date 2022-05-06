<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';
?>


<?php

$sql = "create table if not exists faculty_awards(deptname varchar(100),
Faculty_name varchar(100),
description varchar(500),
date_ varchar(100),
img varchar(500) )";

$result = mysqli_query($conn,$sql);

if (isset($_POST['submit'])) {

    $deptname = $_SESSION['deptname'];
    $type = $_POST['faculty_list'];
    $description = $_POST['description'];
    $date_ = $_POST['date'];

    $tmpFilePath = $_FILES['image']['tmp_name'];
    $rfile_name = 'Faculty_award_'.$deptname.'-'.date('m-d-Y-His').$_FILES["image"]['name'];
    move_uploaded_file($tmpFilePath, "images/".$rfile_name);
    
    $sql = "insert into faculty_awards values('$deptname','$type','$description','$date_','$rfile_name')";    
    $result = mysqli_query($conn,$sql);

}

?>

<script>

function fetchnames()
            {
                deptname = "<?php echo $_SESSION['deptname']; ?>";
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                    console.log(this.responseText);
                    document.getElementById("faculty_list").innerHTML=this.responseText;
                    }
                }
                xmlhttp.open("GET","getusernamebydept.php?q="+deptname,true);
                xmlhttp.send();
            }
fetchnames();
</script>


<div class="row mt-2">
<div class="col">
    <h4 class="text-center">Faculty Award</h4>
</div>   
</div>

<form method="POST" action="" enctype="multipart/form-data">
 <div class="row mt-4">
<div class="col-md-4">
<label for="faculty_list" class="form-label ">Faculty List</label>
<select  id="faculty_list" class="form-select" name="faculty_list">
<option selected="">Choose...</option>
<option value=" ">a</option> 
<option value="">b</option>
<option value=""></option>
</select>
</div>

 <div class="col-md-3">
<label for="description" class="form-label ">Description</label>
<input type="text " class="form-control" id="description " name="description">
</div>

<div class="col-md-3 pe-1">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date">
          </div>
          </div>

<div class="row mt-3">
<div class="col-md-4">
                                    <label for="name" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
</div>

<div class="row mt-3">
    <div class="col-md-12 text-center">
    <button type="Submit" class="btn btn-primary btn-lg mb-4 " name="submit">Submit</button>
    </div>
</div>

        </form>
<?php

include 'endtags.php';
?>


