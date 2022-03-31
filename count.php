
<?php

include 'db_conn.php';

error_reporting(0);

session_start();


$sql = "create table if not exists counts(id varchar(10) primary key,students varchar(100),
qualified_faculty varchar(50),
classroom varchar(20),
laboratories varchar(20))";

$result = mysqli_query($conn,$sql);



$students = "";
$qualified_faculty = "";
$classroom = "";
$lab = "";

$sql = "select * from counts";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$students = $row['students'];
$qualified_faculty = $row['qualified_faculty'];
$classroom = $row["classroom"];
$lab = $row["laboratories"];


if (isset($_POST['submit'])) {

$sql = "insert into counts values('1','1','1','1','1');";
$result = mysqli_query($conn,$sql);

$students = $_POST['students'];
$qualified_faculty = $_POST['Qualified_Faculty'];
$classroom = $_POST["Classroom"];
$lab = $_POST["Laboratories"];


$sql = "update counts set students ='$students',qualified_faculty='$qualified_faculty',classroom='$classroom',laboratories='$lab' where id='1'";

$result = mysqli_query($conn,$sql);

}

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
    <div class="container-login100"
        style="background-image: url('images/img-01.jpg');align-items: start;padding-top: 15vh;">
        <section class="container card col-md-12 mx-auto">
        <form method="POST" action="count.php">
            <center><h4>Count Form</h4></center>
            <div class="col-md-12 ms-5">
            <div class="row me-4">
                <div class="col ">
                    <label for="name" class="form-label ">Students</label>
                    <input type="text" class="form-control" id="students" name="students" value="<?php echo $students;?>">
                </div>
                <div class="col">
                    <label for="name" class="form-label">Qualified Faculty</label>
                    <input type="text" class="form-control" id="Qualified_Faculty" name="Qualified_Faculty" value="<?php echo $qualified_faculty;?>">
                </div>
                <div class="col">
                    <label for="name" class="form-label">Classroom</label>
                    <input type="text" class="form-control" id="Classroom" name="Classroom" value="<?php echo $classroom;?>">
                </div>

                <div class="col">
                    <label for="name" class="form-label">Laboratories</label>
                    <input type="text" class="form-control " id="Laboratories" name="Laboratories" value="<?php echo $lab;?>">
                </div>
            </div>
            </div>

            <div class="row mx-auto mb-3">
                <div class="col-md-7 mx-auto">
                    <button type="Submit" class="btn btn-primary btn-lg"  name="submit">Submit</button>
                </div>
            </div>
            </form>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
