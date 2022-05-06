<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';
?>


<?php

$deptname = $_SESSION['deptname'];

$sql = "create table if not exists studentawards(id int auto_increment primary key,deptname varchar(100),
award_name varchar(100),
name varchar(500),
rollno varchar(100),
img varchar(500),
year varchar(100),
project_guide varchar(100),
project_title varchar(100),
Other_award_title varchar(500),
Other_award_desc varchar(500) 
)";

$result = mysqli_query($conn,$sql);

if (isset($_POST['submit'])) {

    
    $award_name = $_POST['name_of_the_award'];
    $student_name = $_POST['name'];
    $student_roll_no = $_POST['rollno'];
    $year = $_POST['year'];
    $tmpFilePath = $_FILES['image']['tmp_name'];
   


    if($award_name == 'Best Outgoing Student' || $award_name == 'Best Alumini Achiever' ||$award_name == 'Rank Holder Award' )
    {
        $rfile_name_img = 'student_award-'.$award_name.'-'.$deptname.'-'.date('m-d-Y-His').$_FILES["image"]['name'];
        
        $sql = "insert into studentawards(deptname,award_name,name,rollno,img,year) values('$deptname','$award_name','$student_name','$student_roll_no','$rfile_name_img','$year')";    
        $result = mysqli_query($conn,$sql);
    }
    else if($award_name == 'Best Project')
    {
        $guide = $_POST['guide'];
        $project_title = $_POST['project_title'];

        $rfile_name_img = 'student_award-'.$award_name.'-'.$deptname.'-'.date('m-d-Y-His').$_FILES["image"]['name'];
        

        $sql = "insert into studentawards(deptname,award_name,name,rollno,img,year,project_guide,project_title) values('$deptname','$award_name','$student_name','$student_roll_no','$rfile_name_img','$year','$guide','$project_title')";    
        $result = mysqli_query($conn,$sql);
    }
    else{
        $title_of_the_award = $_POST['othertitle'];
        $award_description = $_POST['Description'];

        $rfile_name_img = 'student_award-'.$title_of_the_award.'-'.$deptname.'-'.date('m-d-Y-His').$_FILES["image"]['name'];

        $sql = "insert into studentawards(deptname,award_name,name,rollno,img,year,Other_award_title,Other_award_desc) values('$deptname','$award_name','$student_name','$student_roll_no','$rfile_name_img','$year','$title_of_the_award','$award_description')";    
        $result = mysqli_query($conn,$sql);
    }
    
    move_uploaded_file($tmpFilePath, "images/".$rfile_name_img);

}

?>

                            <div class="row mt-2">
                                <div class="col">
                                    <h4 class="text-center">Student Awards</h4>
                                </div>   
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <label for="name" class="form-label mt-3">Name of the Award</label>
                                    <select onchange="chang()" id="name_of_the_award" class="form-select" name="name_of_the_award">
                                        <option selected="">Choose...</option>
                                        <option value="Best Outgoing Student">Best Outgoing Student</option> 
                                        <option value="Best Alumini Achiever">Best Alumini Achiever</option>
                                        <option value="Rank Holder Award">Rank Holder Award</option>
                                        <option value="Best Project">Best Project</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="name" class="form-label mt-3">Name</label>
                                    <input type="text " class="form-control" id="name" name="name">
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Roll No</label>
                                    <input type="text " class="form-control" id="rollno" name="rollno">
                                </div>
                            </div>

                            <div class="row mt-4">
                                
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>

                                <div class="col-md-4">
                                    <label for="name" class="form-label">Year</label>
                                    <input type="text" class="form-control" name="year" id="datepicker" />
                                </div>

                                <div class="col-md-3" id="guidecol">
                                    <label for="name" class="form-label ">Guide</label>
                                    <input type="text " class="form-control" id="guide" name="guide">
                                </div>

                                <div class="col-md-3" id="othertitlecol">
                                    <label for="name" class="form-label ">Title of the Award</label>
                                    <input type="text " class="form-control" id="othertitle" name="othertitle">
                                </div>
                                

                            </div>

                            <div class="row mt-4">
                                <div class="col-md-3" id="titlecol">
                                    <label for="name" class="form-label ">Project Title</label>
                                    <input type="text " class="form-control" id="title" name="project_title">
                                </div>
                                <div class="col-md-3" id="otherdesccol">
                                    <label for="name" class="form-label ">Description</label>
                                    <input type="text " class="form-control" id="Description" name="Description">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="Submit" class="btn btn-primary btn-lg mb-4 " name="submit">Submit</button>
                                </div>
                            </div>
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

$("#titlecol").hide();
$("#guidecol").hide();
$("#othertitlecol").hide();
$("#otherdesccol").hide();
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
    