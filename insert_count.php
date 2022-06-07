<?php

include 'db_conn.php';

error_reporting(0);

session_start();


$sql = "create table if not exists counts(id int not null auto_increment primary key,
students varchar(300),
qualified_faculty varchar(300),
classroom varchar(300),
laboratories varchar(300)
)";
$result = mysqli_query($conn, $sql);

$sql= "insert into announcement values(0,'0','0','0','0','0','0');";

mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {

    $students = $_POST['students'];
    $faculty = $_POST['Qualified_Faculty'];
    $class = $_POST['Classroom'];
    $lab = $_POST['Laboratories'];
$sql ="insert into counts(students,qualified_faculty,classroom,laboratories) values('$students','$faculty','$class','$lab')";

$result = mysqli_query($conn, $sql);
// $sql = "create table if not exists count(id int not null auto_increment primary key, students varchar(100),
// qualified varchar(100),
// classroom varchar(20),
// labb varchar(300)
// )";
// $result = mysqli_query($conn, $sql);

// $sql= "insert into announcement values(0,'0','0','0','0','0','0');";

// mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {

    $students = $_POST['students'];
    $qualified = $_POST['Qualified_Faculty'];
    $classroom = $_POST['Classroom'];
    $lab = $_POST['Laboratories'];
    $sql ="insert into count(students,qualified,classroom,lab) values('$students','$qualified','$classroom','$lab')";

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

            $t1 = $action.",inserted count";
            $t2 = $form.", count form";


            $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
            $result = mysqli_query($conn,$sql);
            echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                <h4>count added successfully</h4>
            </div>';
        } 
        catch(e)
        {
            echo e;     
        }
    }
}
}

?>

<?php 
include 'appsidebar.php'
?>
                 <!-- <div class="card-body"> -->
            <form method="POST" action="" enctype="multipart/form-data">
            
            <h2 class="ms-3"><b>Count Form</b></h1>
            <div class="main-card m-3 card min-vh-50"style="min-height:60%">
            <div class="card-body">
                    
            <div class="row ">
                <div class="col-md-3">
                    <label for="name" class="form-label">Students</label>
                    <input type="text" class="form-control" id="students" name="students" >
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label ">Qualified Faculty</label>
                    <input type="text"class="form-control" id="Qualified_Faculty" name="Qualified_Faculty" >
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label ">Classroom</label>
                    <input type="text" class="form-control" id="Classroom" name="Classroom" >
                </div>

                <div class="col-md-3">
                    <label for="name" class="form-label">Laboratories</label>
                    <input type="text" class="form-control" id="Laboratories" name="Laboratories" >
                </div>
            </div>

            <div class="row mx-auto ">
                <div class="col mt-4 mx-auto"><br><br>
                <button type="Submit" class="btn btn-primary"  name="submit">Submit</button>
                </div>
            </div>
            </form>
        </section>
    </div>
</div>

</div>
</div>
</div>
    <!-- <script type="text/javascript" src="./assets/scripts/main.js"></script>

    <script>
    const input = document.getElementById('URL_to_be_linked');

    input.addEventListener('input', updateValue);

    function updateValue(e) {
         document.getElementById('File').disabled = true;
    }


    function f2()
    {
        document.getElementById('URL_to_be_linked').disabled = true;
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