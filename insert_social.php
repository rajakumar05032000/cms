<?php

include 'db_conn.php';

error_reporting(0);

session_start();


if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Faculty') {
    header("Location: new_login.php");
  }


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
        try{
            $login_tym = $_SESSION["login_tym"] ;
            $emp_id =  $_SESSION["empid"] ;
            $sql = "select * from log_details where login_tym ='$login_tym' and emp_id ='$emp_id' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $action = $row['action'];
            $form = $row['form'];

            $t1 = $action.",inserted social";
            $t2 = $form.", social form";


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
           <h1 class="ms-3">Social activities</h1>
           <div class="main-card m-3 card min-vh-50"style="min-height:60%">
                        <div class="card-body">
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
                    <label for="name" class="form-label mt-4" >company title</label>
                      <input type="text" class="form-control" id="title_name" name="title_name">
        
                </div>
                <div class="col-md-3">
                    <label for="name"  class="form-label mt-4">image upload</label>
                    <input onclick="f2()" type="file" class="form-control" id="image" name="image">
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label mt-4" >description</label>
                      <input type="text" class="form-control" id="description" name="description">
        
                </div>
            </div>
            <div class="row mt-5 mb-3">
                <div class="col">
                    <button type="Submit" class="btn btn-primary mb-4 "  name="submit">Submit</button>
                </div>
        </div>
            
        <script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);
    </script>
           
        </body>
        <?php
include 'endtags.php'
?>