<?php

// include 'db_conn.php';

// error_reporting(0);

// session_start();




// if (isset($_POST['submit'])) {
//     $sql = "create table if not exists upload(date varchar(100),
//     title varchar(100),
//     brief varchar(1000),
//     image varchar(500),
//     image_main varchar(100))";
    
//     $result = mysqli_query($conn, $sql);


//     $date = $_POST['date'];
//     $title = $_POST['title'];
//     $brief = $_POST['brief'];
//     $image = $_POST['image1'];
//     $image_main = $_POST['image2'];
    


//     $sql = "insert into upload values('$date','$title','$brief','$image','$image_main')";
//     $result = mysqli_query($conn, $sql);
  
//     if ($result) {
//       echo "<script>alert('Inserted Successfully')</script>";
//     } else {
//       echo "<script>alert('User already exists')</script>";
//     }
//   }

include 'db_conn.php';

error_reporting(0);

session_start();




// if (isset($_POST['submit'])) {




//     $sql = "create table if not exists social(date varchar(100),
//     title varchar(100),
//     resource varchar(100),
//     company varchar(500),
//     image varchar(100),
//     description varchar(500))";
    
//     $result = mysqli_query($conn, $sql);


//     $date = $_POST['date'];
//     $title = $_POST['title1'];
//     $resource = $_POST['person'];
//     $company = $_POST['title_name'];
//     $image = $_POST['image'];
//     $description = $_POST['description'];
    


//     $sql = "insert into social values('$date','$title','$resource','$company','$image','$description')";
//     $result = mysqli_query($conn, $sql);
  
//     if ($result) {
//       echo "<script>alert('Inserted Successfully')</script>";
//     } else {
//       echo "<script>alert('User already exists')</script>";
//     }
//   }
$sql = "create table if not exists upload(id int not null auto_increment primary key, datee varchar(100),
titlee varchar(100),
brieff varchar(20),
imagee varchar(300),
imagee_mainn varchar(300)
)";
$result = mysqli_query($conn, $sql);

// $sql= "insert into announcement values(0,'0','0','0','0','0','0');";

// mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {

    $date = $_POST['date'];
    $title = $_POST['title'];
    $brief = $_POST['brief'];
    $image = $_POST['image1'];
    $image_main = $_POST['image2'];
$sql ="insert into upload(datee,titlee,brieff,imagee,imagee_mainn) values('$date','$title','$brief','$image',' $image_main')";

$result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('upload has been made Successfully')</script>";
        } 
  else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
}



?>
<?php
include 'appsidebar.php'
?>
                        <center><h3>Upload</h3></center>
                        <form method="POST" action="" enctype="multipart/form-data">

                        <div class="row mt-5 me-2 justify-content-start">
                            <div class="col-md-5">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                                <div class="col-md-5">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                        </div>
                        <div class="row mt-5">
                                <div class="col-md-10 ">
                                    <label for="brief" class="form-label">In Brief</label>
                                    <textarea class="form-control " id="brief" name="brief" rows="5"></textarea>
                                </div>
                        </div>
                        <div class="row mt-5 me-2 justify-content-start">
                            <div class="col-md-5">
                                <label for="image1" class="form-label">Upload image to be displayed in Main page</label>
                                <input type="file" class="form-control" id="image1" name="image1">
                            </div>
                            <div class="col-md-5">
                                <label for="image2" class="form-label">Upload image gallery</label>
                                <input type="file" class="form-control" id="image2" name="image2">
                            </div>
                        </div>
                        <div class="row mx-auto ">
                            <div class="col mt-4 mx-auto">
                            <center><button type="Submit" class="btn btn-primary"  name="submit">Submit</button></center>
                            </div>
                        </div>

</body>
<?php
include 'endtags.php'
?>