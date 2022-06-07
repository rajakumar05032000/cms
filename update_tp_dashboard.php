<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

$sql = "select * from tpdashboard where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $name = $_POST['name'];
    $titlee = $_POST['titlee'];
    $date = $_POST['date'];
    
    $sql = "update tpdashboard set titlee ='$title', namee='$name', titleee = '$titlee', datee='$date' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_tp_dashboard.php?id=$a_id");
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

            $t1 = $action.",updated training program";
            $t2 = $form.", training program";


            $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
            $result = mysqli_query($conn,$sql);
            echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                <h4>training program added successfully</h4>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<center><h3>Training Program</h3></center>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-3">
            <label for="name" class="form-label mt-5">Title/name</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['titlee'] ?>">
        </div>
        <div class="col-md-3 mx-5">
            <center class="mt-3"><h4>Resource</h4></center>
              <label for="name" class="form-label " >Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['namee'] ?>">
              <label for="name" class="form-label " >Title</label>
              <input type="text" class="form-control" id="titlee" name="titlee" value="<?php echo $row['titleee'] ?>">
             
        </div>
        <div class="col-md-3 ">
            <label for="dojpsg" class="form-label mt-5">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['datee'] ?>">
        </div>
    </div>
    <div class="row mt-5 mb-3">
        <div class="text-center">
            <button type="Submit" class="btn btn-primary mb-4 "  name="submit">update</button>
        </div>
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
