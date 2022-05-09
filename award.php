<?php

include 'db_conn.php';

error_reporting(0);

session_start();




if (isset($_POST['submit'])) {
    $sql = "id int not null auto_increment primary key,faculty varchar(100),
    department varchar(100),
    title varchar(1000),
    date varchar(500),
    award varchar(100),
    image varchar(1000))";
    
    $result = mysqli_query($conn, $sql);


    $faculty = $_POST['outcomes'];
    $department = $_POST['outcomes1'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $award = $_POST['award'];
    $image = $_POST['image1'];
    $sql = "insert into award values('$faculty','$department','$title','$date','$award','$image')";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
      echo "<script>alert('Inserted Successfully')</script>";
    } else {
      echo "<script>alert('User already exists')</script>";
    }
  }
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

?>

<?php
include 'appsidebar.php'
?>
                        <center><h3>Award Received</h3></center>
                        <form method="POST" action="" enctype="multipart/form-data">

                        <div class="row justify-content-start">
                            <div class="col-md-3">
                                <label for="faculty" class="form-label mt-3">Faculty Details</label>
                                <select id="outcomes" class="form-select" name="outcomes" 
                                    <option selected>Choose...</option>
                                    <option value="sudha">sudha</option>
                                    <option value="prabhu">prabhu</option>
                                    <option value="yash">yash</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="dept" class="form-label mt-3">Department</label>
                                <select id="outcomes" class="form-select" name="outcomes1" 
                                    <option selected>Choose...</option>
                                    <option value="ECE">ECE</option>
                                    <option value="IT">IT</option>
                                    <option value="CSE">CSE</option>
                                </select>
                            </div>
                            <div class="row  mt-5 me-2 justify-content-start">
                                <div class="col-md-3">
                                    <label for="title" class="form-label">Title of the award</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="col-md-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                            </div>
                            <div class="row  mt-5 me-2 justify-content-start">
                                <div class="col-md-3">
                                    <label for="award" class="form-label">Award by</label>
                                    <input type="text" class="form-control" id="award" name="award">
                                </div>
                                <div class="col-md-3">
                                    <label for="image1" class="form-label">image upload</label>
                                    <input type="file" class="form-control" id="image1" name="image1">
                                </div>
                            </div>
                            <div class="row mx-auto ">
                                <div class="col mt-4 mx-auto">
                                <center><button type="Submit" class="btn btn-primary"  name="submit">Submit</button></center>
                                </div>
                            </div>
                        </div>
                        <?php
include 'endtags.php'
?>

                           
                            