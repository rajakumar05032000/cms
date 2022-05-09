<?php

    // $collaborating = $_POST['org'];
    // $date = $_POST['date'];
    // $gallery = $_POST['image1'];
    // $description = $_POST['des'];

include 'db_conn.php';

error_reporting(0);
    
session_start();
    
$sql = "create table if not exists mousigned(id int not null auto_increment primary key, collaboratingg varchar(100),
datee varchar(50),
galleryy varchar(20),
descriptionn varchar(300)
)";
$result = mysqli_query($conn, $sql);
    
    // $sql= "insert into announcement values(0,'0','0','0','0','0','0');";
    
    // mysqli_query($conn, $sql);
    
if (isset($_POST['submit'])) {
    
    $collaborating = $_POST['org'];
    $date = $_POST['date'];
    $gallery = $_POST['image1'];
    $description = $_POST['des'];
    $sql ="insert into mousigned(collaboratingg,datee,galleryy,descriptionn) values('$collaborating','$date','$gallery','$description')";
    
    $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('mousigned has been made Successfully')</script>";
            } 
        else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
}

?>
<?php
include 'appsidebar.php'
?>

                        <center><h3>Mou signed </h3></center>
                        <form method="POST" action="" enctype="multipart/form-data">

                        <div class="row  mt-5 me-2 justify-content-start">
                            <div class="col-md-3">
                                <label for="org" class="form-label">collaborating organization</label>
                                <input type="text" class="form-control" id="org" name="org">
                            </div>
                            <div class="col-md-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>
                            <div class="row mt-5 me-2 justify-content-start">
                                <div class="col-md-3">
                                    <label for="image1" class="form-label">gallery</label>
                                    <input type="file" class="form-control" multiple id="image1" name="image1">
                                </div>
                                <div class="col-md-3">
                                    <label for="des" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="des" name="des">
                                </div>
                            </div>
                            <div class="row mx-auto ">
                                <div class="col mt-4 mx-auto">
                                <center><button type="Submit" class="btn btn-primary"  name="submit">Submit</button></center>
                                </div>
                            </div>
