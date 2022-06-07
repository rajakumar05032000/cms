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
        try{
            $login_tym = $_SESSION["login_tym"] ;
            $emp_id =  $_SESSION["empid"] ;
            $sql = "select * from log_details where login_tym ='$login_tym' and emp_id ='$emp_id' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $action = $row['action'];
            $form = $row['form'];

            $t1 = $action.",inserted upload";
            $t2 = $form.", upload form";


            $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
            $result = mysqli_query($conn,$sql);
            echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                <h4>upload added successfully</h4>
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
                       <h2 class="ms-3"><b>Upload<b></h2>
                       <div class="main-card m-4 card min-vh-50"style="min-height:60%">
                        <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">

                        <div class="row mt-5 me-2 justify-content-start">
                            <div class="col-md-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                        </div>
                        <div class="row mt-5">
                                <div class="col-md-5">
                                    <label for="brief" class="form-label">In Brief</label>
                                    <textarea class="form-control " id="brief" name="brief" rows="5"></textarea>
                                </div>
                        </div>
                        <div class="row mt-5 me-2 justify-content-start">
                            <div class="col-md-4">
                                <label for="image1" class="form-label">Upload image to be displayed in Main page</label>
                                <input type="file" class="form-control" id="image1" name="image1">
                            </div>
                            <div class="col-md-4">
                                <label for="image2" class="form-label">Upload image gallery</label>
                                <input type="file" class="form-control" id="image2" name="image2">
                            </div>
                        </div>
                        <div class="row mx-auto ">
                            <div class="col mt-4 mx-auto">
                           <button type="Submit" class="btn btn-primary"  name="submit">Submit</button>
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