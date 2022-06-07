<?php

// include 'db_conn.php';

// error_reporting(0);

// session_start();




// if (isset($_POST['submit'])) {
//     $sql = "create table if not exists award(id int not null auto_increment primary key,facultyy varchar(100),
//     departmentt varchar(100),
//     titlee varchar(1000),
//     datee varchar(500),
//     awardd varchar(100),
//     imagee varchar(1000))";
    
//     $result = mysqli_query($conn, $sql);


//     $faculty = $_POST['outcomes'];
//     $department = $_POST['outcomes1'];
//     $title = $_POST['title'];
//     $date = $_POST['date'];
//     $award = $_POST['award'];
//     $image = $_POST['image1'];
//     $sql = "insert into award values('$faculty','$department','$title','$date','$award','$image')";
//     $result = mysqli_query($conn, $sql);
  
//     if ($result) {
//       echo "<script>alert('Inserted Successfully')</script>";
//     } else {
//       echo "<script>alert('User already exists')</script>";
//     }
// }
// include 'db_conn.php';

// error_reporting(0);

// session_start();

// $sql = "create table if not exists award(id int not null auto_increment primary key, facultyy varchar(100),
//     deaprtmentt varchar(50),
//     titlee varchar(20),
//     datee varchar(300),
//     awardd varchar(300),
//     imagee varchar(100)
//     )";
// $result = mysqli_query($conn, $sql);

// // $sql= "insert into announcement values(0,'0','0','0','0','0','0');";

// // mysqli_query($conn, $sql);

// if (isset($_POST['submit'])) {

//     $faculty = $_POST['outcomes'];
//     $department = $_POST['outcomes1'];
//     $title = $_POST['title'];
//     $date = $_POST['date'];
//     $award = $_POST['award'];
//     $image = $_POST['image1'];
//     $sql ="insert into award(facultyy,departmentt,titlee,datee,awardd,imagee) values('$faculty','$department','$title','$date',' $award','$image')";

//     $result = mysqli_query($conn, $sql);
// 		if ($result) {
// 			echo "<script>alert('award has been made Successfully')</script>";
// 			} 
//       else {
// 				echo "<script>alert('Woops! Something Wrong Went.')</script>";
// 			}
// } 
include 'db_conn.php';

error_reporting(0);
    
session_start();
    
if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Web Incharge') {
    header("Location: new_login.php");
  }

$sql = "create table if not exists award(id int not null auto_increment primary key, facultyy varchar(100),
departmentt varchar(100),
titlee varchar(1000),
datee varchar(500),
awardd varchar(100),
imagee varchar(1000))";;
$result = mysqli_query($conn, $sql);
    
    // $sql= "insert into announcement values(0,'0','0','0','0','0','0');";
    
    // mysqli_query($conn, $sql);
    
if (isset($_POST['submit'])) {
    
    $faculty = $_POST['outcomes'];
    $department = $_POST['outcomes1'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $award = $_POST['award'];
    $image = $_POST['image1'];
    $sql ="insert into award(facultyy,departmentt,titlee,datee,awardd,imagee) values('$faculty','$department','$title','$date',' $award','$image')";
    
    $result = mysqli_query($conn, $sql);
        if ($result){  
            try{
                $login_tym = $_SESSION["login_tym"] ;
                $emp_id =  $_SESSION["empid"] ;
                $sql = "select * from log_details where login_tym ='$login_tym' and emp_id ='$emp_id' ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
    
                $action = $row['action'];
                $form = $row['form'];
    
                $t1 = $action.",inserted award";
                $t2 = $form.", award form";
    
    
                $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
                $result = mysqli_query($conn,$sql);
                echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                    <h4>award added successfully</h4>
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
include 'appsidebar.php'
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

                        <h2 class="ms-3"><b>Award Form</b></h2>
                        <div class="main-card m-3 card min-vh-50" style="min-height:60%">
                        <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">

                        <div class="row justify-content-start">
                            <div class="col-md-4">
                                <label for="faculty" class="form-label mt-3">Faculty Details</label>
                                <select id="outcomes" class="form-select" name="outcomes" >
                                    <option selected>Choose...</option>
                                    <option value="sudha" >sudha</option>
                                    <option value="prabhu" >prabhu</option>
                                    <option value="yash" >yash</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="dept" class="form-label mt-3">Department</label>
                                <select id="outcomes" class="form-select" name="outcomes1" >
                                    <option selected>Choose...</option>
                                    <option value="ECE" >ECE</option>
                                    <option value="IT" >IT</option>
                                    <option value="CSE" >CSE</option>
                                </select>
                            </div>
                            <!-- <div class="row  mt-5 me-2 justify-content-start"> -->
                                <div class="col-md-3">
                                    <label for="title" class="form-label mt-3">Title Of the Award</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="row  mt-5 me-2 justify-content-start">
                                <div class="col-md-4">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                            <!-- </div> -->
                            <!-- <div class="row  mt-5 me-2 justify-content-start"> -->
                                <div class="col-md-3">
                                    <label for="award" class="form-label">Award By</label>
                                    <input type="text" class="form-control" id="award" name="award">
                                </div>
                                <div class="col-md-3">
                                    <label for="image1" class="form-label">Image Upload</label>
                                    <input type="file" class="form-control" id="image1" name="image1">
                                </div>
                            </div>
                            <div class="row mx-auto ">
                                <div class="col mt-4 mx-auto">
                                <button type="Submit" class="btn btn-primary"  name="submit">Submit</button>
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
</html>
                        <?php
include 'endtags.php'
?>

                           
                            