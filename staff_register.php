<?php 

include 'db_conn.php';

error_reporting(0);

session_start();

/*
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}*/

if (isset($_POST['submit'])) {

	$deptname = $_POST['DeptName'];
  $selection_category = $_POST['inlineRadioOptions2'];
	$gender = $_POST['inlineRadioOptions1'];
	$Date_of_joining = $_POST['doj'];
  $employee_id=$_POST['emp_id'];
  $name=$_POST['name'];
  $date_of_birth=$_POST['dob'];
  $bloodgroup=$_POST['BloodGrp'];
  $designation=$_POST['Designation'];
  $designation_n=$_POST['Designation_n'];
  $grade=$_POST['grade'];
  $if_chair_related_to=$_POST['Chair'];
  $profile_picture=$_POST['Pic'];


	
		$sql = "SELECT * FROM user WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (email, password)
					VALUES ( '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
                header("Location: login.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
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
<form method="POST" action=""> 
<div class="container-login100" style="background-image: url('images/img-01.jpg');">
<div class="container card p-5">
  
    <div class="row mx-auto mb-5"><h1>Registration Form</h1></div>
   <div class="row g-3">

  <div class="col">
    <div class="col-10">
    <label for="DeptName" class="form-label">Name of the Department</label>
    <select id="DeptName" class="form-select" name="DeptName">
      <option selected>Choose...</option>
      <option>Information Technology</option>
      <option>Computer Engineering</option>
      <option>Mechanical Engineering</option>
    </select>
  </div>
  </div>

  <div class="col">
    <label for="Selection_category" class="form-label">Selection Category</label>
    <br>
    <div class="form-check form-check-inline mt-2">
    <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio11" value="Grant-in-Aid">
    <label class="form-check-label" for="inlineRadio11">Grant-in-Aid</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="Self Supporting">
    <label class="form-check-label" for="inlineRadio2">Self Supporting</label>
    </div>
    
  </div>


  <div class="col">
    <label for="Gender" class="form-label">Gender</label>
    <br>
    <div class="form-check form-check-inline mt-2">
    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="Male">
    <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio23" value="Female">
    <label class="form-check-label" for="inlineRadio23">Female</label>
    </div>
  </div>
</div>

<div class="row mt-2 g-3">
     
     <div class="col-md-3  pe-1 ">
        
    <label for="doj" class="form-label">Date of Joining</label>
    <input type="date" class="form-control" id="doj" name="doj">
  </div>

  <div class="col-md-3 offset-md-1">
    <label for="emp_id" class="form-label">Employee Id</label>
    <input type="text" class="form-control" id="emp_id" name="emp_id">
  </div>

  <div class="col-md-3 offset-md-1">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
</div>
    

<div class="row mt-2 g-3">
    <div class="col-md-3 pe-1">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob">
    </div>

    <div class="col-md-3 offset-md-1">
         <div class="col-12">
    <label for="BloodGrp" class="form-label">Blood Group</label>
    <select id="BloodGrp" class="form-select" name="BloodGrp">
      <option selected>Choose...</option>
      <option>O+ve</option>
      <option>A+ve</option>
      <option>B+ve</option>
      <option>O-ve</option>
      <option>A-ve</option>
      <option>B-ve</option>
    </select>
  </div>
    </div>
</div>

<div class="row mt-2 g-3">
     <div class="col-md-3 pe-3">
         <div class="col-14">
    <label for="Designation" class="form-label">Designation</label>
    <select onchange="myFunction()" id="Designation" class="form-select" name="Designation">
      <option selected>Choose...</option>
      <option>Teaching</option>
      <option>Non Teaching Technical</option>
      <option>Non Teaching Administrative</option>
    
    </select>
  </div>
    </div>

     <div class="col-md-3 offset-md-1">
         <div class="col-14">
    <label for="Designation_n" class="form-label">Designation</label>
    <select id="Designation_n" class="form-select" name="Designation_n">
      <option selected>Choose...</option>
      <option>Head of the Department</option>
      <option>Lecturer</option>
      
    
    </select>
  </div>
    </div>


     <div class="col-md-3 offset-md-1">
         <div class="col-14">
    <label for="grade" class="form-label">Grade</label>
    <select id="grade" class="form-select" name="grade">
      <option selected>Choose...</option>
      <option>Super</option>
      <option>Normal</option>
      
    
    </select>
  </div>
    </div>


</div>

<div class="row mt-2 g-3">
    <div class="col-md-3 ">
        <label for="chair" class="form-label">If Chair,Related to</label>
         <input type="text" class="form-control" id="chair" name="Chair">   
    </div>

    <div class="col-md-7  offset-md-1">
         <label for="pic" class="form-label">Profile Picture</label>
         <input class="form-control" type="file" id="pic" name="Pic">
    </div>
</div>

<div class="row mt-4 g-3 mx-auto">
    <div class="col-md-3">
        <button type="Submit" class="btn btn-primary btn-lg"  name="submit">Submit</button>
    </div>
</div>
</form>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

function myFunction()
{
  select = document.getElementById('Designation');
  var option_selected = select.value;
  if(option_selected=="Teaching") 
        document.getElementById('Designation_n').innerHTML='<option value="Head of the Department">Head of the Department</option><option value="Lecturer">Lecturer</option>';
    else if(option_selected=="Non Teaching Technical") 
        document.getElementById('Designation_n').innerHTML='<option value="Instructor">Instructor</option><option value="Lab Assistant">Lab Assistant</option>';
    else  
        document.getElementById('Designation_n').innerHTML='<option value="PA to Principal">PA to Principal</option><option value="Office Assistant">Office Assistant</option>';
}
</script>
</body>
</html>