<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Faculty') {
    header("Location: new_login.php");
  }
$sql = "select * from social where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $date = $_POST['date'];
    $title = $_POST['title1'];
    $resource = $_POST['person'];
    $company = $_POST['title_name'];
    $image = $_POST['file'];
    $description = $_POST['description'];
    
    $sql = "update social set datee ='$date', titlee='$title', resourcee = '$resource', companyy='$company', imagee = '$image', descriptionn = '$description' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_social.php?id=$a_id");
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

            $t1 = $action.",updated social";
            $t2 = $form.", deletesocial";


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
            <center class="mt-5"><h3>Social activities</h3></center>
            <form method="POST" action="" enctype="multipart/form-data">

            <div class="row justify-content-evenly">
                <div class="col-md-3">
                    <label for="dojpsg" class="form-label mt-3">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['datee']?>">
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label mt-3" >title</label>
                      <input type="text" class="form-control" id="title1" name="title1" value="<?php echo $row['titlee']?>">
        
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label mt-3" >resource person</label>
                      <input type="text" class="form-control" id="person" name="person" value="<?php echo $row['resourcee']?>">
        
                </div>
            </div>
            <div class="row justify-content-evenly">
                <div class="col-md-3">
                    <label for="name" class="form-label mt-3" >company title</label>
                      <input type="text" class="form-control" id="title_name" name="title_name" value="<?php echo $row['companyy']?>">
        
                </div>
                <div class="col-md-3">
                    <label for="name"  class="form-label mt-3">image upload</label>
                    <input onclick="f2()" type="file" class="form-control" id="File" name="File" value="<?php echo $row['imagee']?>">
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label mt-3" >description</label>
                      <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['descriptionn']?>">
        
                </div>
            </div>
            <div class="row mt-5 mb-3">
                <div class="text-center">
                    <button type="Submit" class="btn btn-primary mb-4 "  name="submit">update</button>
                </div>
        </div>
            

        <script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);   
</script>
           
        </body>