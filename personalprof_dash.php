<?php

include 'db_conn.php';

error_reporting(0);

session_start();

 $deptname = $_SESSION["deptname"];
 $empid = $_SESSION["empid"];


if (isset($_POST['submit'])) {




    $sql = "create table if not exists profile_details(emp_id int, emp_name_a varchar(50),emp_name_b varchar(50),Gender varchar(20),dob date,selection_category varchar(50),
    dept_name varchar(50), designation varchar(50), dojp varchar(50), dojcp varchar(50),linkedinurl varchar(250),door_and_street_p varchar(50),locality_p varchar(50),city_p varchar(50),pincode_p varchar(50),
    door_and_street_cp varchar(50),locality_cp varchar(50),city_cp varchar(50), pincode_cp varchar(50), email_official varchar(100), email_personal varchar(100), landline_office varchar(50),Extn varchar(100),landline_res varchar(50),
    mobile varchar(15),brief_on_yourself varchar(200), blood_grp varchar(10), google_scholar varchar(200),total_publications varchar(10))";
    
    $result = mysqli_query($conn, $sql);


    //$emp_id = $_POST['Emp_id'];
    $emp_name_a = $_POST['emp_name_a'];
    $emp_name_b = $_POST['emp_name_b'];
    $gender = $_POST['inlineRadioOptions1'];
    $dob = $_POST['dob'];
    $selection_category = $_POST['inlineRadioOptions2'];
    //$deptname = $_POST['dept_name'];
    $designation = $_POST['designation'];
    $dojpsg = $_POST['dojpsg'];
    $dojcp = $_POST['dojcp'];
    $linkedinurl = $_POST['linkedinurl'];
    $pdoorandstreet = $_POST['pdoorandstreet'];
    $plocality = $_POST['plocality'];
    $pcity = $_POST['pcity'];

    $ppincode = $_POST['ppincode'];
    $cdoorandstreet = $_POST['cdoorandstreet'];
    $clocality = $_POST['clocality'];
    $ccity = $_POST['ccity'];
    $cpincode = $_POST['cpincode'];
    $emailoff = $_POST['emailoff'];
    $emailpersonal = $_POST['emailpersonal'];
    $landlineoff = $_POST['landlineoff'];
    $extn = $_POST['extn'];


    
    $landlineres = $_POST['landlineres'];
    $mobile = $_POST['mobile'];
    $briefonyourself = $_POST['briefonyourself'];
    $BloodGrp = $_POST['BloodGrp'];
    $googlescholar = $_POST['googlescholar'];
    $totalpublications = $_POST['totalpublications'];


    $sql = "insert into profile_details values($emp_id,'$emp_name_a','$emp_name_b','$gender','$dob','$selection_category','$deptname','$designation','$dojpsg','$dojcp','$linkedinurl','$pdoorandstreet','$plocality','$pcity','$ppincode','$cdoorandstreet','$clocality','$ccity','$cpincode','$emailoff','$emailpersonal','$landlineoff','$extn','$landlineres','$mobile','$briefonyourself','$BloodGrp','$googlescholar','$totalpublications')";
    $result = mysqli_query($conn, $sql);
  
    if ($result) {
      echo "<script>alert('Inserted Successfully')</script>";
    } else {
      echo "<script>alert('User already exists')</script>";
    }
  }
  

?>

<?php
include 'appsidebar.php'
?>
                    <center>
                        <h4 class="mt-3">Personal Profile</h4>
                    </center>
                    <div class="col-md-12">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row me-2">
                                <div class="col-md-5">
                                    <label for="name" class="form-label mt-3">Employee Id</label>
                                    <input type="text " class="form-control" id="Emp_id" name="Emp_id" value="<?php echo $empid; ?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="name" class="form-label mt-3">Employee Name</label>
                                    <select id="emp_name_a" class="form-select" name="emp_name_a">
                                        <option selected="">Choose...</option>
                                        <option value="Ms">Ms</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-3  ">
                                    <label for="name" class="form-label mt-3">Employee Name</label>
                                    <input type="text " class="form-control" id="emp_name_b" name="emp_name_b">
                                </div>

                                <div class="col-md-2">
                                    <label for="Gender" class="form-label mt-3">Gender</label>
                                    <br>
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions1"
                                            id="inlineRadio1" value="Male">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions1"
                                            id="inlineRadio23" value="Female">
                                        <label class="form-check-label" for="inlineRadio23">Female</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 me-2 ">
                                <div class="col-md-3 ">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob">
                                </div>

                                <div class="col-md-4 ">
                                    <label for="Selection_category" class="form-label">Selection Category</label>
                                    <br>
                                    <div class="form-check form-check-inline mt-2 ">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2"
                                            id="inlineRadio11" value="Grant-in-Aid">
                                        <label class="form-check-label" for="inlineRadio11">Grant-in-Aid</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2"
                                            id="inlineRadio2" value="Self Supporting">
                                        <label class="form-check-label" for="inlineRadio2">Self Supporting</label>
                                    </div>
                                </div>

                                <div class="col-md-3 ">
                                    <label for="dept_name" class="form-label">Department Name</label>
                                    <input type="text " class="form-control" id="dept_name" name="dept_name" value="<?php echo $deptname; ?>" disabled>
                                </div>
                                <div class="col-md-2">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text " class="form-control" id="designation" name="designation">
                                </div>

                            </div>


                            <div class="row mt-3 me-2 ">
                                <div class="col-md-3 ">
                                    <label for="dojpsg" class="form-label">Date of Joining at PSG</label>
                                    <input type="date" class="form-control" id="dojpsg" name="dojpsg">
                                </div>

                                <div class="col-md-4 ">
                                    <label for="dojcp" class="form-label">Date of Joining,Current Post</label>
                                    <input type="date" class="form-control" id="dojcp" name="dojcp">
                                </div>

                                <div class="col">
                                    <label for="linkedinurl" class="form-label">Linked in Personal Page URL</label>
                                    <input type="text " class="form-control" id="linkedinurl" name="linkedinurl">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <h4 class="text-center mt-5">Permanent Address</h4>
                            </div>
                            <div class="row mt-4 me-2">
                                <div class="col-md-4">
                                    <label for="pdoorandstreet" class="form-label">Door No & Street Name</label>
                                    <input type="text " class="form-control" id="pdoorandstreet" name="pdoorandstreet">
                                </div>

                                <div class="col-md-3">
                                    <label for="plocality" class="form-label">Locality</label>
                                    <input type="text " class="form-control" id="plocality" name="plocality">
                                </div>

                                <div class="col-md-2">
                                    <label for="pcity" class="form-label">City</label>
                                    <input type="text " class="form-control" id="pcity" name="pcity">
                                </div>

                                <div class="col-md-3">
                                    <label for="ppincode" class="form-label">Pincode</label>
                                    <input type="text " class="form-control" id="ppincode" name="ppincode">
                                </div>
                            </div>



                            <div class="row mt-4">
                                <h4 class="text-center mt-5">Contact Address</h4>
                            </div>
                            <div class="row mt-1 me-2">
                                <div class="col-md-4">
                                    <label for="cdoorandstreet" class="form-label">Door No & Street Name</label>
                                    <input type="text " class="form-control" id="cdoorandstreet" name="cdoorandstreet">
                                </div>

                                <div class="col-md-3">
                                    <label for="clocality" class="form-label">Locality</label>
                                    <input type="text " class="form-control" id="clocality" name="clocality">
                                </div>

                                <div class="col-md-2">
                                    <label for="ccity" class="form-label">City</label>
                                    <input type="text " class="form-control" id="ccity" name="ccity">
                                </div>

                                <div class="col-md-3">
                                    <label for="ppincode" class="form-label">Pincode</label>
                                    <input type="text " class="form-control" id="cpincode" name="cpincode">
                                </div>
                            </div>

                            <div class="row mt-3 me-2">
                                <div class="col-md-3">
                                    <label for="emailoff" class="form-label">Email Id - Official</label>
                                    <input type="text " class="form-control" id="emailoff" name="emailoff">
                                </div>

                                <div class="col-md-3">
                                    <label for="emailpersonal" class="form-label">Email Id - Personal</label>
                                    <input type="text " class="form-control" id="emailpersonal" name="emailpersonal">
                                </div>


                                <div class="col-md-3">
                                    <label for="landlineoff" class="form-label">Landline Office</label>
                                    <input type="text " class="form-control" id="landlineoff" name="landlineoff">
                                </div>

                                <div class="col-md-3">
                                    <label for="extn" class="form-label">Extn</label>
                                    <input type="text " class="form-control" id="extn" name="extn">
                                </div>
                            </div>



                            <div class="row mt-3 me-2">
                                <div class="col-md-3">
                                    <label for="landlineres" class="form-label">Landline Residence</label>
                                    <input type="text " class="form-control" id="landlineres" name="landlineres">
                                </div>

                                <div class="col-md-3">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="tel " class="form-control" id="mobile" name="mobile">
                                </div>


                                <div class="col-md-4">
                                    <label for="briefonyourself" class="form-label">Brief on Yourself</label>
                                    <input type="text " class="form-control" id="briefonyourself" name="briefonyourself">
                                </div>

                                <div class="col-md-2">
                                    <label for="DeptName" class="form-label">Blood Group</label>
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


                            <div class="row mt-3 me-2">
                                <div class="col-md-6">
                                    <label for="googlescholar" class="form-label">Google Scholar Url</label>
                                    <input type="text " class="form-control" id="googlescholar" name="googlescholar">
                                </div>

                                <div class="col-md-3">
                                    <label for="totalpublications" class="form-label">Total No.of Publications</label>
                                    <input type="number" class="form-control" id="totalpublications" name="totalpublications">
                                </div>
                               
                            </div>

                            <div class="row mt-5 mb-3">
                                    <div class="text-center">
                                        <button type="Submit" class="btn btn-primary mb-4 "  name="submit">Submit</button>
                                    </div>
                            </div>
                    </div>
                </div>
                <script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
<style>
    .form-label {
        font-size: 0.90rem;
    }
</style>

</html>