<?php
include 'db_conn.php';
error_reporting(0);

session_start();

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Faculty') {
    header("Location: new_login.php");
  }
$sql = "create table if not exists education( id varchar(10) primary key,faculty_code varchar(100),
department_code varchar(50),
graduate varchar(50),
domain varchar(100),
degree varchar(100),
institute_university varchar(250))";

$result = mysqli_query($conn,$sql);

$faculty_code = "";
$deparment_code = "";
$graduate = "";
$domain = "";
$degree = "";
$institute_university = "";

$sql = "select * from education";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$faculty_code = $row['faculty_code'];
$deparment_code = $row['department_code'];
$graduate = $row['graduate'];
$domain = $row['domain'];
$degree = $row['degree'];
$institute_university = $row['institute_university'];

if (isset($_POST['submit'])) {

    $sql = "insert into education values('1','1','1','1','1','1','1');";
    $result = mysqli_query($conn,$sql);

    $faculty_code = $_POST['faculty_code'];
    $department_code = $_POST['dep_code'];
    $graduate = $_POST['outcomes'];
    $domain = $_POST['Domain'];
    $degree = $_POST['Degree'];
    $institute_university = $_POST['Institude/university'];

    $sql = "update education set faculty_code ='$faculty_code',department_code='$department_code',graduate='$graduate',domain='$domain',degree='$degree',institute_university='$institute_university' where id='1'";
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
    <div class="container-login100 " style="background-image: url('images/img-01.jpg');">
        <div class="container card p-4 col-md-10" >
            <center><h1>Graduation Details</h1></center>
            <form method="POST" action="">
            <div class="row">
                <div class="col">
                    <label for="name"  class="form-label mt-3">Faculty Code</label>
                            <input type="text" class="form-control " id="faculty_code" name="faculty_code">

                </div>
                <div class="col">
                    <label for="name"  class="form-label mt-3">Department Code</label>
                            <input type="text" class="form-control " id="dep_code" name="dep_code">

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label mt-3">Graduate</label>
                    <select onchange="myFunction()" id="Graduate" class="form-select" name="outcomes">
                        <option selected>Choose..</option>
                        <option value="UG">UG</option> 
                        <option value="PG">PG</option>
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label mt-3">Domain</label>
                    <select id="Domain" class="form-select" name="Domain">
                        <option selected>Choose...</option>
                        <option value="s">S</option> 
                        <option value="P">P</option>
                        <option value="PR">PR</option>
                      </select>
                </div>
                <div class="col">
                    <label for="name" class="form-label mt-3">Degree</label>
                    <select id="Degree" class="form-select" name="Degree">
                        <option selected>Choose...</option>
                        <option value="b.tech">b.tech</option> 
                        <option value="b.e">b.e</option>
                        <option value="PR">civil</option>
                      </select>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name"  class="form-label mt-3 mb-3">Institute / University</label>
                    <input type="text" class="form-control mb-3 " id="Institude/university" name="Institude/university">

                </div>
            </div>
                
            
                <center><button type="Submit" class="btn btn-primary mb-4 "  name="submit">Submit</button></center>
              
            
        </div>

    </div>
</form>
<script>

function myFunction()
{
  select = document.getElementById('Graduate');
  var option_selected = select.value;
  if(option_selected=="UG") {
        document.getElementById('Domain').innerHTML='<option value="S">S</option><option value="R">R</option><option value="PR">PR</option>';
        document.getElementById('Degree').innerHTML='<option value="B.E">B.E</option><option value="B.Tech">B.Tech</option>';
  }
  else  {
        document.getElementById('Domain').innerHTML='<option value="T">T</option><option value="O">O</option>';
        document.getElementById('Degree').innerHTML='<option value="M.E">M.E</option><option value="M.Tech">M.Tech</option>';
  }
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>