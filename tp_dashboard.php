<?php

include 'db_conn.php';

error_reporting(0);

session_start();

$sql = "create table if not exists tp( id varchar(10) primary key,
title varchar(100),
name varchar(50),
titlee varchar(50),
date varchar(50))";
$result = mysqli_query($conn,$sql);



$title = "";
$name = "";
$titlee = "";
$date = "";

$sql = "select * from training";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$title = $row['title'];
$name = $row['name'];
$titlee = $row["titlee"];
$date = $row["date"];


if (isset($_POST['submit'])) {

    $sql = "insert into counts values('1','1','1','1','1');";
    $result = mysqli_query($conn,$sql);
    
    $title = $_POST['title'];
    $name = $_POST['name'];
    $titlee = $_POST["titlee"];
    $date = $_POST["date"];
    
    
    $sql = "update training set title ='$title',name='$name',titlee='$titlee',date='$date' where id='1'";
    
    $result = mysqli_query($conn,$sql);
    
    }

?>
<?php
include 'appsidebar.php'
?>
    <center><h3>Training Program</h3></center>
    <div class="row">
        <div class="col-md-3">
            <label for="name" class="form-label mt-5">Title/name</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="col-md-3 mx-5">
            <center class="mt-3"><h4>Resource</h4></center>
              <label for="name" class="form-label " >Name</label>
              <input type="text" class="form-control" id="chief_name" name="name">
              <label for="name" class="form-label " >Title</label>
              <input type="text" class="form-control" id="chief_title" name="titlee">
             
        </div>
        <div class="col-md-3 ">
            <label for="dojpsg" class="form-label mt-5">Date</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
    </div>
    <div class="row mt-5 mb-3">
        <div class="text-center">
            <button type="Submit" class="btn btn-primary mb-4 "  name="submit">Submit</button>
        </div>
    </div>
    </div>
  </div>  
</body>