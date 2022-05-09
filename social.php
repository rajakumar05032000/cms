<?php

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
$sql = "create table if not exists social(id int not null auto_increment primary key, datee varchar(100),
titlee varchar(100),
resourcee varchar(20),
companyy varchar(300),
imagee varchar(300),
descriptionn varchar(100)
)";
$result = mysqli_query($conn, $sql);

// $sql= "insert into announcement values(0,'0','0','0','0','0','0');";

// mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {

    $date = $_POST['date'];
    $title = $_POST['title1'];
    $resource = $_POST['person'];
    $company = $_POST['title_name'];
    $image = $_POST['image'];
    $description = $_POST['description'];
$sql ="insert into social(datee,titlee,resourcee,companyy,imagee,descriptionn) values('$date','$title','$resource','$company',' $image','$description')";

$result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('social has been made Successfully')</script>";
        } 
  else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
}

?>



<?php
include 'appsidebar.php'
?>
            <center class="mt-5"><h3>Social activities</h3></center>
            <form method="POST" action="" enctype="multipart/form-data">

            <div class="row justify-content-evenly">
                <div class="col-md-3">
                    <label for="dojpsg" class="form-label mt-3">Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label mt-3" >title</label>
                      <input type="text" class="form-control" id="title1" name="title1">
        
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label mt-3" >resource person</label>
                      <input type="text" class="form-control" id="person" name="person">
        
                </div>
            </div>
            <div class="row justify-content-evenly">
                <div class="col-md-3">
                    <label for="name" class="form-label mt-3" >company title</label>
                      <input type="text" class="form-control" id="title_name" name="title_name">
        
                </div>
                <div class="col-md-3">
                    <label for="name"  class="form-label mt-3">image upload</label>
                    <input onclick="f2()" type="file" class="form-control" id="image" name="image">
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label mt-3" >description</label>
                      <input type="text" class="form-control" id="description" name="description">
        
                </div>
            </div>
            <div class="row mt-5 mb-3">
                <div class="text-center">
                    <button type="Submit" class="btn btn-primary mb-4 "  name="submit">Submit</button>
                </div>
        </div>
            
            
           
        </body>
        <?php
include 'endtags.php'
?>