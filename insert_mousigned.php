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
            try{
                $login_tym = $_SESSION["login_tym"] ;
                $emp_id =  $_SESSION["empid"] ;
                $sql = "select * from log_details where login_tym ='$login_tym' and emp_id ='$emp_id' ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
    
                $action = $row['action'];
                $form = $row['form'];
    
                $t1 = $action.",inserted mousigned";
                $t2 = $form.", mousigned form";
    
    
                $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
                $result = mysqli_query($conn,$sql);
                echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                    <h4>mousigned added successfully</h4>
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

                        <h2 class="ms-3"><b>Mou Signed</b></h2>
                        <div class="main-card m-3 card min-vh-75" style="min-height:50%" style="min-height:60%">
                        <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">

                        <div class="row  mt-5 me-2 justify-content-start">
                            <div class="col-md-3">
                                <label for="org" class="form-label">Collaborating organization</label>
                                <input type="text" class="form-control" id="org" name="org">
                            </div>
                            <div class="col-md-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                                <div class="col-md-3 ">
                                    <label for="image1" class="form-label">Gallery</label>
                                    <input type="file" class="form-control" multiple id="image1" name="image1">
                                </div>
                                <div class="col-md-3">
                                    <label for="des" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="des" name="des">
                                </div>
                            </div>
                            <div class="row mx-auto ">
                                <div class="col mt-5 mx-auto">
                                <button type="Submit" class="btn btn-primary"  name="submit">Submit</button>
                                </div>
                            </div>

                            <script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);
    </script>

                            <?php
include 'endtags.php'
?>
