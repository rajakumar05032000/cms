<?php
session_start(); 
$del_id=$_GET['id'];

include 'db_conn.php';


if (!isset($_SESSION['empid']) && $_SESSION['designation']!='HOD') {
    header("Location: new_login.php");
}

$sql = "delete from scheme where id='$del_id'";
$result = mysqli_query($conn,$sql);

if($result)
{
    echo "<script>alert('scheme Deleted Successfully')</script>";
    header("Location: viewform_scheme.php");
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

        $t1 = $action.",deleted scheme";
        $t2 = $form.", scheme form";


        $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
        $result = mysqli_query($conn,$sql);
        echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
            <h4>scheme deleted successfully</h4>
        </div>';
    } 
    catch(e)
    {
        echo e;     
    }
}

?>
<script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);   
</script>