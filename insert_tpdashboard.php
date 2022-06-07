<?php

include 'db_conn.php';

error_reporting(0);

session_start();

$sql = "create table if not exists tpdashboard(id int not null auto_increment primary key, titlee varchar(100),
    namee varchar(50),
    titleee varchar(20),
    datee varchar(300)
    )";
$result = mysqli_query($conn, $sql);

// $sql= "insert into announcement values(0,'0','0','0','0','0','0');";

// mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $name = $_POST['name'];
    $titlee = $_POST['titlee'];
    $date = $_POST['date'];
    
    $sql ="insert into tpdashboard(titlee,namee,titleee,datee) values('$title','$name','$titlee','$date')";

    $result = mysqli_query($conn, $sql);
		if ($result) {  
            try{
                $login_tym = $_SESSION["login_tym"] ;
                $emp_id =  $_SESSION["empid"] ;
                $sql = "select * from log_details where login_tym ='$login_tym' and emp_id ='$emp_id' ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
    
                $action = $row['action'];
                $form = $row['form'];
    
                $t1 = $action.",inserted training program";
                $t2 = $form.", training program form";
    
    
                $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
                $result = mysqli_query($conn,$sql);
                echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                    <h4>training added successfully</h4>
                </div>';
            } 
            catch(e)
            {
                echo e;     
            }
        }
}
?>
<?php
include 'appsidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2 class=ms-3><b>Training Program</b></h1>
<div class="main-card m-3 card min-vh-50"style="min-height:60%">
                        <div class="card-body">
<form method="POST" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-3">
            <label for="name" class="form-label mt-5">Title/name</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="col-md-3 mx-5">
            <center class="mt-3"><h4>Resource</h4></center>
              <label for="name" class="form-label " >Name</label>
              <input type="text" class="form-control" id="name" name="name">
              <label for="name" class="form-label " >Title</label>
              <input type="text" class="form-control" id="titlee" name="titlee">
             
        </div>
        <div class="col-md-3 ">
            <label for="dojpsg" class="form-label mt-5">Date</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
    </div>
    <div class="row mt-5 mb-3">
        <div class="text">
            <button type="Submit" class="btn btn-primary mb-4 "  name="submit">Submit</button>
        </div>
    </div>
    </div>
  </div>  
  <script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);
    </script>
</body>
    
</body>
</html>
<?php
include 'endtags.php'
?>