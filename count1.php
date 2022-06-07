<?php

include 'db_conn.php';

error_reporting(0);

session_start();

$sql = "create table if not exists count_1( id1 varchar(10) primary key,outcomes varchar(100),
id varchar(50),
text varchar(250))";
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags-->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Colorlib Templates">
   <meta name="author" content="Colorlib">
   <meta name="keywords" content="Colorlib Templates">

   <!-- Title Page-->
   <title>Registration-Form</title>

   <!-- Icons font CSS-->
   <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
   <!-- Font special for pages-->
   <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Vendor CSS-->
   <link href="vendor/select2/reg/select2.min.css" rel="stylesheet" media="all">
   <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

   <!-- Main CSS-->
   <link href="css/reg_main.css" rel="stylesheet" media="all">
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/staff_register.css">
</head>

<body>
    <div class="container-login100 "
        style="background-image: url('images/img-01.jpg');align-items: start;padding-top: 15vh;">



        <section class="container card col-md-4  mx-auto">

            <div class="row">
                <div class="col-md-7">
                    <label for="name" class="form-label">Students</label>
                    <input type="text" class="form-control" id="students" name="students">
                </div>
            </div>
            <div class="row mt-3 mb-4">
                <div class="col-md-7">
                    <label for="name" class="form-label">Students</label>
                    <input type="text" class="form-control" id="students" name="students">
                </div>
            </div>

            <div class="row mx-auto mb-3">
                <div class="col-md-7 mx-auto">
                    <button type="Submit" class="btn btn-primary btn-lg"  name="submit">Submit</button>
                </div>
            </div>
            
        </section>
       
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    </body>
    </html>