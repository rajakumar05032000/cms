<?php

include 'db_conn.php';

error_reporting(0);

session_start();

$sql = "create table if not exists departmentdata(id varchar(10) primary key,name varchar(100),
year varchar(100),
about varchar(500),
vision varchar(750),
mision varchar(1000),
hod_image varchar(250),
hod_desk varchar(500),
flash varchar(200) )";

$result = mysqli_query($conn,$sql);

$name="";
$year="";
$about="";
$vision="";
$mision="";
$hod_image="";
$hod_desk="";
$flash="";

$sql = "select * from departmentdata";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$name=$row['name'];
$year=$row['year'];
$about=$row['about'];
$vision=$row['vision'];
$mision=$row['mission'];
$hod_image=$row['hod_image'];
$hod_desk=$row['hod_desk'];
$flash=$row['flash'];

if (isset($_POST['submit'])) {

    $sql = "insert into departmentdata values('1','1','1','1','1','1','1','1','1');";
    $result = mysqli_query($conn,$sql);
    $name=$_POST['name_of_the_dept'];
    $year=$_POST['year_of_establishment'];
    $about=$_POST['about_the_department'];
    $vision=$_POST['vision_of_the_department'];
    $mision=$_POST['mission_of_the_department'];
    $hod_image=$_POST["hod's_image"];
    $hod_desk=$_POST["Hod's_desk"];
    $flash=$_POST['img'];

$sql = "update departmentdata set name='$name',year ='$year',about='$about',vision='$vision',mision='$mision',hod_image='$hod_image',hod_desk='$hod_desk',flash='$flash' where id='1'";
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
        <div class="container card col-md-4" >
            <div class="col-md-12 ms-3">
            <center><h1>Department data</h1></center>
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-10 ">
                        <label for="name" class="form-label mt-3">Name of the department</label>
                    <select onchange="fetchnames()" id="name_of_the_dept" class="form-select" name="name_of_the_dept">
                        <option selected>Choose...</option>
                        <option value="IT">IT</option> 
                        <option value="CSE">CSE</option>
                        <option value="Mech">Mech</option>
                      </select>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">year of establishment</label>
                        <input type="text " class="form-control" id="year_of_establishment" name="year_of_establishment">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                    <label for="name" class="form-label">About the department</label>
                        <input type="text " class="form-control" id="about_the_department" name="about_the_department">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="name" class="form-label">vision of the department</label>
                        <textarea class="form-control mb-3 me-3" id="vision_of_the_department" name="vision_of_the_department" rows="5"></textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="name" class="form-label">mission of the department</label>
                        <textarea class="form-control mb-3 me-3" id="mission_of_the_department" name="mission_of_the_department" rows="5"></textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="name" class="form-label">hod's image</label>
                        <input type="file" class="form-control" id="hod's_image" name="hod's_image">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <img src="" class="img-thumbnail"  width="100" height="100" id="hod's_pic" name="hod_pic"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="name" class="form-label">hod's Desk</label>
                        <textarea class="form-control mb-3 me-3" id="Hod's_desk" name="Hod's_desk" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="name" class="form-label">add images for flash/photo gallery</label>
                        <input type="file" class="form-control" id="img" name="img" multiple>
                    </div>
                </div>
                <div class="row mx-auto  mt-3 mb-3">
                    <div class="col-md-7 mx-auto">
                        <button type="Submit" class="btn btn-primary "  name="submit">Submit</button>
            </div>
        </div>
    

                
            </div>
        </div>

</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function fetchnames()
            {
                deptname = document.getElementById('name_of_the_dept').value;
                    if (deptname=="") {
                    document.getElementById("name").innerHTML="";
                    return;
                }
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                    console.log(this.responseText);
                    details = JSON.parse(this.responseText);
                    document.getElementById("name_of_the_dept").value=details.deptname;
                    document.getElementById("year_of_establishment").value=details.year;
                    document.getElementById("about_the_department").value=details.about;
                    document.getElementById("vision_of_the_department").value=details.vision;
                    document.getElementById("mission_of_the_department").value=details.mission;
                    
                    document.getElementById("Hod's_desk").value=details.hod_desk;
                    
                    
                    }
                }
                xmlhttp.open("GET","getvision_mission_by_department.php?q="+deptname,true);
                xmlhttp.send();
            }
    </script>
</body>
</html>