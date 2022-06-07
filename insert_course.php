<?php

// include 'db_conn.php';

// error_reporting(0);

// session_start();



// if (isset($_POST['submit'])) {
//     $sql = "create table if not exists course_structure( id varchar(10) primary key,outcomes varchar(100),
//     text varchar(250),department varchar(100))";

//     $result = mysqli_query($conn, $sql);

//     $outcomes = $_POST['outcomes'];
//     $id = $_POST['id'];
//     $text = $_POST["text"];
//     $department = $_SESSION['department'];

//     $sql = "insert into course_structure values('$id','$outcomes','$text','$department');";
//     $result = mysqli_query($conn, $sql);

//     if (!$result) {
//         $sql = "update course_structure set outcomes ='$outcomes',text='$text',department='$department' where id='$id'";
//         $result1 = mysqli_query($conn, $sql);
//         echo "<script>alert('Updated Successfully')</script>";
//         if ($result1) {
//             echo "<script>alert('Added Successfully')</script>";
//             header("Location: course_structure_dashboard.php");
//         }
//     } else if($result) {
//         header("Location: course_structure_dashboard.php");
//     }else{
//         echo "<script>alert('Error')</script>";
//     }
// }

include 'db_conn.php';

error_reporting(0);

session_start();

$sql = "create table if not exists course_structure(id int not null auto_increment primary key, outcomess varchar(100),
    idd varchar(20),
    textt varchar(300)
    )";
$result = mysqli_query($conn, $sql);

// $sql= "insert into announcement values(0,'0','0','0','0','0','0');";

// mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {

$outcomes = $_POST['outcomes'];

$id = $_POST['id'];
$text = $_POST['text'];
    $sql ="insert into course_structure(outcomess,idd,textt) values('$outcomes','$id','$text')";

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
    
                $t1 = $action.",inserted course";
                $t2 = $form.", course form";
    
    
                $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
                $result = mysqli_query($conn,$sql);
                echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                    <h4>course added successfully</h4>
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
                        <h2 class="ms-3"><b>Course Structure</b></h2>
                    <div class="main-card m-3 card min-vh-50" style="min-height:60%">
                        <div class="card-body">
                    <form action="" method="POST">
                        <div class="row justify-content-start">
                            <div class="col-md-3">
                                <label for="name" class="form-label mt-3">Outcomes</label>
                                <select id="outcomes" class="form-select" name="outcomes" value="<?php echo $outcomes; ?>">
                                    <option selected>Choose...</option>
                                    <option value="PROGRAM OUTCOMES">PROGRAM OUTCOMES</option>
                                    <option value="PROGRAM SPECIFIC OUTCOMES">PROGRAM SPECIFIC OUTCOMES</option>
                                    <option value="PROGRAM EDUCATIONAL OBJECTIVES">PROGRAM EDUCATIONAL OBJECTIVE</option>
                                </select>
                            </div>
                       
                            <div class="col-md-3">
                                <label for="name" class="form-label mt-3 ">Id</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
    
                            </div>
                       
                            <div class="col-md-3">
                                <label for="name" class="form-label mt-3">Text</label>
                                <textarea class="form-control" id="text" name="text" rows="3"><?php echo $text ?></textarea>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col mt-3">
                              <button type="Submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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