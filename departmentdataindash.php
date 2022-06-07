<?php

include 'db_conn.php';

error_reporting(0);

session_start();
$deptname = $_SESSION['deptname'];
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

$sql = "select * from departmentdata where name='$deptname'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$name=$_SESSION['deptname'];
$year=$row['year'];
$about=$row['about'];
$vision=$row['vision'];
$mision=$row['mision'];
$hod_image=$row['hod_image'];
$hod_desk=$row['hod_desk'];
$flash=$row['flash'];

if (isset($_POST['submit'])) {

    
    $name=$_POST['name_of_the_dept'];
    $year=$_POST['year_of_establishment'];
    $about=$_POST['about_the_department'];
    $vision=$_POST['vision_of_the_department'];
    $mision=$_POST['mision'];
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
<?php
include 'appsidebar.php'
?>

<h2 class="ms-3 mt-2"><b>Department Data</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">
            <div class="col-md-12 ms-3">
           
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 ">
                        <label for="name" class="form-label mt-3">Name of the department</label>
                        <input type="text " class="form-control" id="Name_of_the_department" name="Name_of_the_department" value="<?php echo $deptname ?>" disabled>
                        </div>
                        <div class="col-md-6 mt-3">
                        <label for="name" class="form-label">Year of establishment</label>
                        <input type="text " class="form-control" id="year_of_establishment" name="year_of_establishment" value="<?php echo $year ?>">
                    </div>
                    </div>
                <div class="row">
                   
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                    <label for="name" class="form-label">About the department</label>
                        <input type="text " class="form-control" id="about_the_department" name="about_the_department" value="<?php echo $about ?>" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label for="name" class="form-label">Vision of the department</label>
                        <textarea class="form-control mb-3 me-3" id="vision_of_the_department" name="vision_of_the_department" rows="3"><?php echo $vision ?></textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label for="name" class="form-label">Mission of the department</label>
                        <textarea class="form-control mb-3 me-3" id="mission_of_the_department" name="mission_of_the_department" rows="3"><?php echo $mision ?></textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mt-3">
                        <label for="name" class="form-label">Hod's image</label>
                        <input type="file" class="form-control" id="hod's_image" name="hod's_image" value="<?php echo $hod_image ?>">
                    </div>
                    <div class="col-md-2 mt-3">
                        <img src="<?php echo $hod_image ?>" class="img-thumbnail" width="100" height="130" id="hod's_pic" name="hod_pic"> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label for="name" class="form-label">Hod's Desk</label>
                        <textarea class="form-control mb-3 me-3" id="Hod's_desk" name="Hod's_desk" rows="3"><?php echo $hod_desk ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label for="name" class="form-label">Add images for Flash / Photo gallery</label>
                        <input type="file" class="form-control" id="img" name="img[]" multiple="" value="<?php echo $flash ?>">
                    </div>
                </div>
                
                        <button type="Submit" class="btn btn-primary btn-lg mb-4 mt-4" name="submit">Submit</button>
            
        </div>
    

                
            </form></div>
        
                </div>
            </div>
        </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
    <script>
        // function fetchnames()
        //     {
        //         deptname = document.getElementById('name_of_the_dept').value;
        //             if (deptname=="") {
        //             document.getElementById("name").innerHTML="";
        //             return;
        //         }
        //         var xmlhttp=new XMLHttpRequest();
        //         xmlhttp.onreadystatechange=function() {
        //             if (this.readyState==4 && this.status==200) {
        //             console.log(this.responseText);
        //             details = JSON.parse(this.responseText);
        //             document.getElementById("name_of_the_dept").value=details.deptname;
        //             document.getElementById("year_of_establishment").value=details.year;
        //             document.getElementById("about_the_department").value=details.about;
        //             document.getElementById("vision_of_the_department").value=details.vision;
        //             document.getElementById("mission_of_the_department").value=details.mission;
        //             document.getElementById("hod's_pic").src = "images/"+details.hod_image;
        //             document.getElementById("Hod's_desk").value = details.hod_desk;

        //             document.getElementById("hod's_image").value = details.hod_image;
                    
                    
        //             }
        //         }
        //         xmlhttp.open("GET","getvision_mission_by_department.php?q="+deptname,true);
        //         xmlhttp.send();
        //     }

        // imgInp = document.getElementById("hod's_image");
        // blah = document.getElementById("hod's_pic");
        // imgInp.onchange = evt => {
        // const [file] = imgInp.files
        // if (file) {
        //     blah.src = URL.createObjectURL(file)
        //     }
        // }
    </script>

</body>
    </html>
    