<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';
?>


<?php

$deptname = $_SESSION['deptname'];

$sql = "create table if not exists training_program(id int auto_increment primary key,deptname varchar(100),
type varchar(100),
fors varchar(500),
start_date varchar(100),
end_date varchar(100),
pdf varchar(500),
title varchar(500),
speaker json,
description json )";

$result = mysqli_query($conn,$sql);

if (isset($_POST['submit'])) {

    
    $json = json_encode($_POST, JSON_FORCE_OBJECT);
    $data = json_decode($json);

    $speaker_json = json_encode($data->speaker_name,JSON_FORCE_OBJECT);
    $description_json = json_encode($data->description,JSON_FORCE_OBJECT);

    $type = $_POST['Type'];
    $fors = $_POST['fors'];
    $dos = $_POST['dos'];
    $doe = $_POST['doe'];
    $title = $_POST['title'];
    
    $tmpFilePath = $_FILES['pdf']['tmp_name'];
    $rfile_name_pdf = 'training_program_'.$deptname.'-'.date('m-d-Y-His').$_FILES["pdf"]['name'];
    move_uploaded_file($tmpFilePath, "images/".$deptname."/"."training_program/".$rfile_name_pdf);


    $sql = "insert into training_program values(null,'$deptname','$type','$fors','$dos','$doe','$rfile_name_pdf','$title','$speaker_json','$description_json')";    
    $result = mysqli_query($conn,$sql);

    if ($result) {
        $login_tym = $_SESSION["login_tym"] ;
        $emp_id =  $_SESSION["empid"] ;
        
        $sql = "select * from log_details where login_tym ='$login_tym' and user ='$emp_id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $action = $row['action'];
        $form = $row['form'];

        $t1 = $action.",inserted training_program_details";
        $t2 = $form.", training_program_details";


        $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and user ='$emp_id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('training_program details inserted Successfully')</script>";
        } 
  else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }

}

?>

<h2 class="ms-3 mt-2"><b>Training Program</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Type</label>
                                    <select  id="Type" class="form-select" name="Type">
                                        <option selected="">Choose...</option>
                                        <option value="Inhouse">Inhouse</option> 
                                        <option value="Company">Company</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Faculty / Students</label>
                                    <select  id="fors" class="form-select" name="fors">
                                        <option selected="">Choose...</option>
                                        <option value="Faculty">Faculty</option> 
                                        <option value="Student">Student</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label for="dos" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="dos" name="dos">
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label for="doe" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="doe" name="doe">
                                </div>
                            </div>

                            <div class="row mt-4">
                                
                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Title of Training Programme</label>
                                    <input type="text " class="form-control" id="title" name="title">
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label for="name" class="form-label">Upload PDF</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf">
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Speaker Name</label>
                                    <input type="text " class="form-control" id="speaker_name" name="speaker_name[]">
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Description of the Industry</label>
                                    <input type="text " class="form-control" id="description" name="description[]">
                                </div>

                            </div>

                            <div id="toadd" class="row"></div>


                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-primary btn-lg mb-4 " id="addbt" name="Addbt">Add Industry </button>
                                    <button type="Submit" class="btn btn-primary btn-lg mb-4 ms-5" name="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div
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
</script>

<script>
    $("#addbt").on('click',()=>{
        txt2 = `<div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Speaker Name</label>
                                    <input type="text " class="form-control" id="speaker_name" name="speaker_name[]">
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Description of the Industry</label>
                                    <input type="text " class="form-control" id="description" name="description[]">
                                </div>`
       $("#toadd").append(txt2);
    })
</script>

<style>
  #training_program_style
  {
    background-color: rgb(135,206,235);
  }
  </style>
</body>
    </html>
    