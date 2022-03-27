<?php

include 'db_conn.php';

error_reporting(0);

session_start();

$sql = "create table if not exists departmentdata(name varchar(100) unique,
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

    
    $name=$_POST['name_of_the_dept'];
    $year=$_POST['year_of_establishment'];
    $about=$_POST['about_the_department'];
    $vision=$_POST['vision_of_the_department'];
    $mision=$_POST['mission_of_the_department'];
    $hod_image=$_FILES["hod's_image"]['name'];
    $hod_desk=$_POST["Hod's_desk"];


$flash="";

$file_name = $_FILES["hod's_image"]['name'];
$file_tmp =$_FILES["hod's_image"]['tmp_name'];
move_uploaded_file($file_tmp,"images/".$file_name);

$total = count($_FILES['img']['name']);
for( $i=0 ; $i < $total ; $i++ ) {
    $tmpFilePath = $_FILES['img']['tmp_name'][$i];
    $file_name = $_FILES["img"]['name'][$i];
    $flash = $flash."$file_name".",";
    move_uploaded_file($tmpFilePath, "images/".$file_name);
}

if(!$hod_image || $total == 1 )
{
    if(!$hod_image && $total == 1) 
        {
            $sql = "update departmentdata set year ='$year',about='$about',vision='$vision',mision='$mision',hod_desk='$hod_desk' where name='$name'";    
            $result = mysqli_query($conn,$sql);
        }
    else if(!$hod_image)
    {
        $sql = "update departmentdata set year ='$year',about='$about',vision='$vision',mision='$mision',hod_desk='$hod_desk',flash='$flash' where name='$name'";    
            $result = mysqli_query($conn,$sql);
    }
    else
    {
            $sql =  $sql = "update departmentdata set year ='$year',about='$about',vision='$vision',mision='$mision',hod_desk='$hod_desk',hod_image='$hod_image' where name='$name'";   
            $result = mysqli_query($conn,$sql);
    }
}
else{

$sql = "replace into departmentdata values('$name','$year','$about','$vision','$mision','$hod_image','$hod_desk','$flash')";    
//$sql = "update departmentdata set name='$name',year ='$year',about='$about',vision='$vision',mision='$mision',hod_image='$hod_image',hod_desk='$hod_desk',flash='$flash' where id='1'";
$result = mysqli_query($conn,$sql);
}


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
        <div class="container card col-md-4  g-3" >
        <center><h1 class = "mt-3">Department data</h1></center>
            <div class="col-md-12 ms-3">
           
                <form method="POST" action="" enctype="multipart/form-data">
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
                    <div class="col-md-6 mt-3">
                        <label for="name" class="form-label">Year of establishment</label>
                        <input type="text " class="form-control" id="year_of_establishment" name="year_of_establishment">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mt-3">
                    <label for="name" class="form-label">About the department</label>
                        <input type="text " class="form-control" id="about_the_department" name="about_the_department">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mt-3">
                        <label for="name" class="form-label">Vision of the department</label>
                        <textarea class="form-control mb-3 me-3" id="vision_of_the_department" name="vision_of_the_department" rows="5"></textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mt-3">
                        <label for="name" class="form-label">Mission of the department</label>
                        <textarea class="form-control mb-3 me-3" id="mission_of_the_department" name="mission_of_the_department" rows="5"></textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mt-3">
                        <label for="name" class="form-label">Hod's image</label>
                        <input type="file" class="form-control" id="hod's_image" name="hod's_image">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 mt-3">
                        <img src="" class="img-thumbnail"  width="100" height="130" id="hod's_pic" name="hod_pic"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mt-3">
                        <label for="name" class="form-label">Hod's Desk</label>
                        <textarea class="form-control mb-3 me-3" id="Hod's_desk" name="Hod's_desk" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mt-3">
                        <label for="name" class="form-label">Add images for flash/photo gallery</label>
                        <input type="file" class="form-control" id="img" name="img[]" multiple>
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
                    document.getElementById("hod's_pic").src = "images/"+details.hod_image;
                    document.getElementById("Hod's_desk").value = details.hod_desk;

                    document.getElementById("hod's_image").value = details.hod_image;
                    
                    
                    }
                }
                xmlhttp.open("GET","getvision_mission_by_department.php?q="+deptname,true);
                xmlhttp.send();
            }

        imgInp = document.getElementById("hod's_image");
        blah = document.getElementById("hod's_pic");
        imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>
</html>