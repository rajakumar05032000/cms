<?php

// include 'db_conn.php';

// error_reporting(0);

// session_start();

// $sql = "create table if not exists departmentdata(name varchar(100) unique,
// year varchar(100),
// about varchar(500),
// vision varchar(750),
// mision varchar(1000),
// hod_image varchar(250),
// hod_desk varchar(500),
// flash varchar(200) )";

// $result = mysqli_query($conn,$sql);

// $name="";
// $year="";
// $about="";
// $vision="";
// $mision="";
// $hod_image="";
// $hod_desk="";
// $flash="";

// $sql = "select * from departmentdata";
// $result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc($result);

// $name=$row['name'];
// $year=$row['year'];
// $about=$row['about'];
// $vision=$row['vision'];
// $mision=$row['mission'];
// $hod_image=$row['hod_image'];
// $hod_desk=$row['hod_desk'];
// $flash=$row['flash'];

// if (isset($_POST['submit'])) {
//     $name=$_POST['name_of_the_dept'];
//     $year=$_POST['year_of_establishment'];
//     $about=$_POST['about_the_department'];
//     $vision=$_POST['vision_of_the_department'];
//     $mision=$_POST['mission_of_the_department'];
//     $hod_image=$_FILES["hod's_image"]['name'];
//     $hod_desk=$_POST["Hod's_desk"];


// $flash="";

// $file_name = $_FILES["hod's_image"]['name'];
// $file_tmp =$_FILES["hod's_image"]['tmp_name'];
// move_uploaded_file($file_tmp,"images/".$file_name);

// $total = count($_FILES['img']['name']);
// for( $i=0 ; $i < $total ; $i++ ) {
//     $tmpFilePath = $_FILES['img']['tmp_name'][$i];
//     $file_name = $_FILES["img"]['name'][$i];
//     $flash = $flash."$file_name".",";
//     move_uploaded_file($tmpFilePath, "images/".$file_name);
// }

// if(!$hod_image || $total == 1 )
// {
//     if(!$hod_image && $total == 1) 
//         {
//             try{
//                 $sql = "update departmentdata set year='$year',about='$about',vision='$vision',mision='$mision',hod_desk='$hod_desk' where name='$name'";    
//                 $result = mysqli_query($conn,$sql);
//             }
//             catch(Exception $err)
//             {
//                 echo "<script>alert('$err')</script>";
//             }

//         }
//     else if(!$hod_image)
//     {
//         try{
//         $sql = "update departmentdata set year ='$year',about='$about',vision='$vision',mision='$mision',hod_desk='$hod_desk',flash='$flash' where name='$name'";    
//             $result = mysqli_query($conn,$sql);
//         }
//         catch(Exception $err)
//         {
//             echo "<script>alert('$err')</script>";
//         }
//     }
//     else
//     { 
//         try{
//             $sql =  $sql = "update departmentdata set year ='$year',about='$about',vision='$vision',mision='$mision',hod_desk='$hod_desk',hod_image='$hod_image' where name='$name'";   
//             $result = mysqli_query($conn,$sql);
//         }
//         catch(Exception $err)
//         {
//             echo "<script>alert('$err')</script>";
//         }
//     }
// }
// else{
//     $sql = "replace into departmentdata values('$name','$year','$about','$vision','$mision','$hod_image','$hod_desk','$flash')";    
//     //$sql = "update departmentdata set name='$name',year ='$year',about='$about',vision='$vision',mision='$mision',hod_image='$hod_image',hod_desk='$hod_desk',flash='$flash' where id='1'";
//     $result = mysqli_query($conn,$sql);
// }


// }
include 'db_conn.php';
error_reporting(0);
    
session_start();


if (!isset($_SESSION['empid']) && $_SESSION['designation']!='HOD') {
    header("Location: new_login.php");
}
    
$sql = "create table if not exists departmentdata(id int not null auto_increment primary key, namee varchar(100),
yearr varchar(50),
aboutt varchar(20),
visionn varchar(300),
misionn varchar(50),
imagee varchar(20),
deskk varchar(300),
imageee varchar(300)
)";
$result = mysqli_query($conn, $sql);
    
    // $sql= "insert into announcement values(0,'0','0','0','0','0','0');";
    
    // mysqli_query($conn, $sql);
    
if (isset($_POST['submit'])) {
    
    $name=$_POST['name_of_the_dept'];
    $year=$_POST['year_of_establishment'];
    $about=$_POST['about_the_department'];
    $vision=$_POST['vision_of_the_department'];
    $mision=$_POST['mission_of_the_department'];
    $image=$_FILES["hod's_image"];
    $desk=$_POST["Hod's_desk"];
    $imagee=$_POST["img"];

    $sql ="insert into departmentdata(namee,yearr,aboutt,visionn,misionn,imagee,deskk,imageee) values('$name','$year','$about','$vision','$mision','$image','$desk','$imagee')";
    
    $result = mysqli_query($conn, $sql);
        if ($result) {              
            try{
                $login_tym = $_SESSION["login_tym"] ;
                $emp_id =  $_SESSION["empid"] ;
                $sql = "select * from departmentdata where login_tym ='$login_tym' and emp_id ='$emp_id' ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
    
                $action = $row['action'];
                $form = $row['form'];
    
                $t1 = $action.",inserted departmentdata";
                $t2 = $form.", departmentdata form";
    
    
                $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
                $result = mysqli_query($conn,$sql);
                echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                    <h4>Department added successfully</h4>
                </div>';
            } 
            catch(e)
            {
                echo e;     
            }
        }
        else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
}
?>
<?php
include 'appsidebar.php'
?>
        <h2 class="ms-3"><b>Department Data</b></h2>
            <!-- <div class="col-md-12 ms-3"> -->
            <div class="main-card m-3 card min-vh-50" style="min-height:60%">
                        <div class="card-body">
           
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 ">
                        <label for="name" class="form-label mt-3">Name of the Department</label>
                        <select onchange="fetchnames()" id="name_of_the_dept" class="form-select" name="name_of_the_dept">
                        <option selected="">Choose...</option>
                        <option value="IT">IT</option> 
                        <option value="CSE">CSE</option>
                        <option value="Mech">Mech</option>
                      </select>
                        </div>
                    <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Year of Establishment</label>
                        <input type="text " class="form-control" id="year_of_establishment" name="year_of_establishment">
                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                    <label for="name" class="form-label">About the Department</label>
                        <input type="text " class="form-control" id="about_the_department" name="about_the_department">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Vision of the Department</label>
                        <textarea class="form-control mb-3 me-3" id="vision_of_the_department" name="vision_of_the_department" rows="5"></textarea>

                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Mission of the Department</label>
                        <textarea class="form-control mb-3 me-3" id="mission_of_the_department" name="mission_of_the_department" rows="5"></textarea>

                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">HOD's Image</label>
                        <input type="file" class="form-control" id="hod's_image" name="hod's_image">
                    </div>
                <!-- </div>

                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <img src="" class="img-thumbnail" width="100" height="130" id="hod's_pic" name="hod_pic"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">HOD's Desk</label>
                        <textarea class="form-control mb-3 me-3" id="Hod's_desk" name="Hod's_desk" rows="5"></textarea>
                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Add Images for Flash / Photo Gallery</label>
                        <input type="file" class="form-control" id="img" name="img" multiple="">
                    </div>
                </div>
                
                        <button type="Submit" class="btn btn-primary btn-lg mb-4 mt-4" name="submit">Submit</button>
            
        </div>
    

                
            </form></div>
        
                </div>
            </div>
        </div>
    <!-- <script type="text/javascript" src="./assets/scripts/main.js"></script>
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
    </script> -->

    <script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);
    </script>
    

</body>
    </html>
    <?php
include 'endtags.php'
?>
    
    