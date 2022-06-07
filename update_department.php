<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];


if (!isset($_SESSION['empid']) && $_SESSION['designation']!='HOD') {
    header("Location: new_login.php");
}

$sql = "select * from departmentdata where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $name=$_POST['name_of_the_dept'];
    $year=$_POST['year_of_establishment'];
    $about=$_POST['about_the_department'];
    $vision=$_POST['vision_of_the_department'];
    $mision=$_POST['mission_of_the_department'];
    $image=$_FILES["hod's_image"];
    $desk=$_POST["Hod's_desk"];
    $imagee=$_POST["img"];
    
    $sql = "update departmentdata set namee ='$name', yearr='$year', aboutt = '$about', visionn='$vision', misionn = '$mision', imagee = '$image', deskk = '$desk', imageee = '$imagee' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_department.php?id=$a_id");
    }
    {  
        try{
            $login_tym = $_SESSION["login_tym"] ;
            $emp_id =  $_SESSION["empid"] ;
            $sql = "select * from log_details where login_tym ='$login_tym' and emp_id ='$emp_id' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $action = $row['action'];
            $form = $row['form'];

            $t1 = $action.",updated department";
            $t2 = $form.", deparment form";


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
}


?>
<?php
include 'appsidebar.php'
?>

        <h1 class="ms-3">Department data</h1>
            <!-- <div class="col-md-12 ms-3"> -->
            <div class="main-card m-3 card min-vh-100">
                        <div class="card-body">
           
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 ">
                        <label for="name" class="form-label mt-3">Name of the department</label>
                        <select onchange="fetchnames()" id="name_of_the_dept" class="form-select" name="name_of_the_dept" value="<?php echo $row['namee'] ?>">
                        <option selected="">Choose...</option>
                        <option value="IT">IT</option> 
                        <option value="CSE">CSE</option>
                        <option value="Mech">Mech</option>
                      </select>
                        </div>
                    <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Year of establishment</label>
                        <input type="text " class="form-control" id="year_of_establishment" name="year_of_establishment" value="<?php echo $row['yearr'] ?>">
                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                    <label for="name" class="form-label">About the department</label>
                        <input type="text " class="form-control" id="about_the_department" name="about_the_department" value="<?php echo $row['aboutt'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Vision of the department</label>
                        <input type="text" class="form-control mb-3 me-3" id="vision_of_the_department" name="vision_of_the_department" rows="5" value="<?php echo $row['visionn'] ?>"><

                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Mission of the department</label>
                        <input type="text" class="form-control mb-3 me-3" id="mission_of_the_department" name="mission_of_the_department" rows="5" value="<?php echo $row['misionn'] ?>">

                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Hod's image</label>
                        <input type="file" class="form-control" id="hod's_image" name="hod's_image" value="<?php echo $row['imagee'] ?>">
                    </div>
                <!-- </div>

                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <img src="" class="img-thumbnail" width="100" height="130" id="hod's_pic" name="hod_pic"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Hod's Desk</label>
                        <input type="text" class="form-control mb-3 me-3" id="Hod's_desk" name="Hod's_desk" rows="5" value="<?php echo $row['deskk'] ?>">
                    </div>
                <!-- </div>
                <div class="row"> -->
                    <div class="col-md-3 mt-3">
                        <label for="name" class="form-label">Add images for Flash / Photo gallery</label>
                        <input type="file" class="form-control" id="img" name="img" multiple="" value="<?php echo $row['imageee'] ?>">
                    </div>
                </div>
                
                        <button type="Submit" class="btn btn-primary btn-lg mb-4 mt-4" name="submit">update</button>
            
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
include 'appsidebar.php'
?>
    