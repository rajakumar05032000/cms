<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';
?>


<?php

$deptname = $_SESSION['deptname'];
$id=$_GET['id'];

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Web Incharge') {
    header("Location: new_login.php");
  }

$sql = "select * from studentawards where id='$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);


$award_name = $row['award_name'];
$name = $row['name'];
$rollno = $row['rollno'];
$year = $row['year'];
$project_guide = $row['project_guide'];
$project_title = $row['project_title'];
$Other_award_title = $row['Other_award_title'];
$Other_award_desc = $row['Other_award_desc'];


if (isset($_POST['submit'])) {

 
    
    $award_name = $_POST['name_of_the_award'];
    $student_name = $_POST['name'];
    $student_roll_no = $_POST['rollno'];
    $year = $_POST['year'];
    $tmpFilePath = $_FILES['image']['tmp_name'];
   


    if($award_name == 'Best Outgoing Student' || $award_name == 'Best Alumini Achiever' ||$award_name == 'Rank Holder Award' )
    {
        $rfile_name_img = 'student_award-'.$award_name.'-'.$deptname.'-'.date('m-d-Y-His').$_FILES["image"]['name'];
        
        $sql = "replace into studentawards(id,deptname,award_name,name,rollno,img,year) values('$id','$deptname','$award_name','$student_name','$student_roll_no','$rfile_name_img','$year')";    
        $result = mysqli_query($conn,$sql);
    }
    else if($award_name == 'Best Project')
    {
        $guide = $_POST['guide'];
        $project_title = $_POST['project_title'];

        $rfile_name_img = 'student_award-'.$award_name.'-'.$deptname.'-'.date('m-d-Y-His').$_FILES["image"]['name'];
        

        $sql = "replace into studentawards(id,deptname,award_name,name,rollno,img,year,project_guide,project_title) values('$id','$deptname','$award_name','$student_name','$student_roll_no','$rfile_name_img','$year','$guide','$project_title')";    
        $result = mysqli_query($conn,$sql);
    }
    else{
        $title_of_the_award = $_POST['othertitle'];
        $award_description = $_POST['Description'];

        $rfile_name_img = 'student_award-'.$title_of_the_award.'-'.$deptname.'-'.date('m-d-Y-His').$_FILES["image"]['name'];

        $sql = "replace into studentawards(id,deptname,award_name,name,rollno,img,year,Other_award_title,Other_award_desc) values('$id','$deptname','$award_name','$student_name','$student_roll_no','$rfile_name_img','$year','$title_of_the_award','$award_description')";    
        $result = mysqli_query($conn,$sql);
    }
    
    move_uploaded_file($tmpFilePath, "images/".$deptname."/"."student_awards/".$year."/".$rfile_name_img);

   
        $login_tym = $_SESSION["login_tym"] ;
        $emp_id =  $_SESSION["empid"] ;
        
        $sql = "select * from log_details where login_tym ='$login_tym' and user ='$emp_id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $action = $row['action'];
        $form = $row['form'];

        $t1 = $action.",updated student_award_details";
        $t2 = $form.", student_award_details";


        $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and user ='$emp_id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('student_award details updated Successfully')</script>";
        

}

?>

<h2 class="ms-3 mt-2"><b>Student Awards</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label for="name" class="form-label mt-3">Name of the Award</label>
                                    <select onchange="chang()" id="name_of_the_award" class="form-select" name="name_of_the_award">
                                        <option selected="">Choose...</option>
                                        <option value="Best Outgoing Student" <?php if ($award_name == 'Best Outgoing Student') echo ' selected="selected"'; ?>>Best Outgoing Student</option> 
                                        <option value="Best Alumini Achiever" <?php if ($award_name == 'Best Alumini Achiever') echo ' selected="selected"'; ?>>Best Alumini Achiever</option>
                                        <option value="Rank Holder Award" <?php if ($award_name == 'Rank Holder Award') echo ' selected="selected"'; ?>>Rank Holder Award</option>
                                        <option value="Best Project" <?php if ($award_name == 'Best Project') echo ' selected="selected"'; ?>>Best Project</option>
                                        <option value="Other" <?php if ($award_name == 'Other') echo ' selected="selected"'; ?>>Other</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="name" class="form-label mt-3">Name</label>
                                    <input type="text " class="form-control" id="name" name="name" value='<?php echo $name ;?>'>
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Roll No</label>
                                    <input type="text " class="form-control" id="rollno" name="rollno" value='<?php echo $rollno ;?>'>
                                </div>
                            </div>

                            <div class="row mt-4">
                                
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" value='<?php echo $rfile_name_img ;?>'>
                                </div>

                                <div class="col-md-4">
                                    <label for="name" class="form-label">Year</label>
                                    <input type="text" class="form-control" name="year" id="datepicker"  value='<?php echo $year ;?>'/>
                                </div>

                                <div class="col-md-3" id="guidecol">
                                    <label for="name" class="form-label ">Guide</label>
                                    <input type="text " class="form-control" id="guide" name="guide" value='<?php echo $project_guide ;?>'>
                                </div>

                                <div class="col-md-3" id="othertitlecol">
                                    <label for="name" class="form-label ">Title of the Award</label>
                                    <input type="text " class="form-control" id="othertitle" name="othertitle" value='<?php echo $Other_award_title ;?>'>
                                </div>
                                

                            </div>

                            <div class="row mt-4">
                                <div class="col-md-3" id="titlecol">
                                    <label for="name" class="form-label ">Project Title</label>
                                    <input type="text " class="form-control" id="title" name="project_title" value='<?php echo $project_title ;?>'>
                                </div>
                                <div class="col-md-3" id="otherdesccol">
                                    <label for="name" class="form-label ">Description</label>
                                    <input type="text " class="form-control" id="Description" name="Description" value='<?php echo $Other_award_desc ;?>'>
                                </div>
                            </div>


                           
                                    <button type="Submit" class="btn btn-primary btn-lg mb-4 mt-3 " name="submit">Submit</button>
                             
</form>

                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>  
<script>

$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});

// $("#titlecol").hide();
// $("#guidecol").hide();
// $("#othertitlecol").hide();
// $("#otherdesccol").hide();

$( document ).ready(function() {
    var s = document.getElementById('name_of_the_award').value;
    if(s=='Best Project')
    {
        $("#titlecol").show();
        $("#guidecol").show();
        $("#othertitlecol").hide();
        $("#otherdesccol").hide();
    }
    else if(s == 'Other')
    {
        $("#othertitlecol").show();
        $("#otherdesccol").show();
        $("#titlecol").hide();
        $("#guidecol").hide();
    }
    else
    {
        $("#titlecol").hide();
        $("#guidecol").hide();
        $("#othertitlecol").hide();
        $("#otherdesccol").hide();
    }
});


function chang()
{
   
    var s = document.getElementById('name_of_the_award').value;
    if(s=='Best Project')
    {
        $("#titlecol").show();
        $("#guidecol").show();
        $("#othertitlecol").hide();
        $("#otherdesccol").hide();
    }
    else if(s == 'Other')
    {
        $("#othertitlecol").show();
        $("#otherdesccol").show();
        $("#titlecol").hide();
        $("#guidecol").hide();
    }
    else
    {
        $("#titlecol").hide();
        $("#guidecol").hide();
        $("#othertitlecol").hide();
        $("#otherdesccol").hide();
    }
}
</script>


</body>
    </html>
    