<?php
include 'db_conn.php';
session_start();
include 'appsidebar.php';

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Admin') {
  header("Location: new_login.php");
}


?>

<?php

$sql = "create table if not exists jobrole(id int auto_increment primary key,deptname varchar(100),
staffname varchar(100),
empid varchar(500),
designation varchar(100),
from_ varchar(100),
to_ varchar(500))";

$result = mysqli_query($conn,$sql);



if (isset($_POST['submit'])) {


    $deptname = $_POST['DeptName'];
    $name = $_POST['name'];
    $emp_id = $_POST['emp_id'];
    $designation = $_POST['Designation'];
    $from = $_POST['From'];
    $to = $_POST['To'];


    $sql = "insert into jobrole values(null,'$deptname','$name','$emp_id','$designation','$from','$to')";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        $login_tym = $_SESSION["login_tym"] ;
        $emp_id =  $_SESSION["empid"] ;
        
        $sql = "select * from log_details where login_tym ='$login_tym' and user ='$emp_id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $action = $row['action'];
        $form = $row['form'];

        $t1 = $action.",inserted jobrole";
        $t2 = $form.", jobrole";


        $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and user ='$emp_id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('JobRole details inserted Successfully')</script>";
        } 
    else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
}

?>


<h2 class="ms-3 mt-2"><b>Job Role</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">
<form method="POST" action="" enctype="multipart/form-data">
<div class="row mt-3">
<div class="col-md-3">
            <label for="DeptName" class="form-label">Name of the Department</label>
            <select  onchange="fetchnames()" id="DeptName" class="form-select" name="DeptName">
              <option selected>Choose...</option>
              <option>Information Technology</option>
              <option>Computer Engineering</option>
              <option>Mechanical Engineering</option>
            </select>
          
          </div>

          <div class="col-md-3 ">
            <label for="name" class="form-label">Name</label>
            <select onchange="fetchempid()" id="name" class="form-select" name="name">
                <option selected>Choose...</option>
              </select>
          </div>

          <div class="col-md-3 ">
            <label for="emp_id" class="form-label">Employee Id</label>
            <input type="text" class="form-control" id="emp_id" name="emp_id" readonly="readonly" >
          </div>

          <div class="col-md-3">
            <label for="Designation" class="form-label">Designation</label>
            <select  id="DeptName" class="form-select" name="Designation">
              <option selected>Choose...</option>
              <option>Admin</option>
              <option>Web Incharge</option>
              <option>HOD</option>
              <option>Faculty</option>
            </select>
          
          </div>
</div>
<div class="row mt-3">
<div class="col-md-3">
    <label for="From" class="form-label">From</label>
    <input type="date" class="form-control" id="From" name="From"></div>

    <div class="col-md-3 ">
    <label for="To" class="form-label">To</label>
    <input type="date" class="form-control" id="To" name="To"></div>
</div>

<button type="Submit" class="btn btn-primary btn-lg mb-4 mt-4" name="submit">Submit</button>

</form>

<style>
  #jobrole_style
  {
    background-color: rgb(135,206,235);
  }
  </style>

<?php
include 'endtags.php';
?>

<script>

            function fetchnames()
            {
                deptname = document.getElementById('DeptName').value;
                    if (deptname=="") {
                    document.getElementById("name").innerHTML="";
                    return;
                }
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                    console.log(this.responseText);
                    document.getElementById("name").innerHTML=this.responseText;
                    }
                }
                xmlhttp.open("GET","getusernamebydept.php?q="+deptname,true);
                xmlhttp.send();
            }

            function fetchempid()
            {
              name = document.getElementById('name').value;
                    if (name=="") {
  
                    return;
                }
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                    console.log(this.responseText);
                    details = JSON.parse(this.responseText);
                        

                          document.getElementById('emp_id').value = details.emp_id;
                         
                        
    
                    }
                }
                xmlhttp.open("GET","getalldetailsbyname.php?q="+name,true);
                xmlhttp.send();
            }
</script>
