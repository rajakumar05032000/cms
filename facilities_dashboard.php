<?php
include 'db_conn.php';
error_reporting(0);

session_start();

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Web Incharge') {
  header("Location: new_login.php");
}

$sql = "create table if not exists facilities( feature varchar(10),Title_of_the_laboratory varchar(100),
major_equipment_details varchar(200),date_of_inaugration varchar(100),cost_in_lakhs varchar(100))";

$result = mysqli_query($conn,$sql);

$feature = "";
$Title_of_the_laboratory = "";
$major_equipment_details = "";
$date_of_inaugration = "";
$cost_in_lakhs= "";

$sql = "select * from  facilities";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$feature = $row['feature'];
$Title_of_the_laboratory = $row['Title_of_the_laboratory'];
$major_equipment_details= $row['major_equipment-details'];
$date_of_inaugration = $row['date_of_inaugration'];
$cost_in_lakhs = $row['cost_in_lakhs'];

if (isset($_POST['submit'])) {

    $sql = "insert into facilities values('1','1','1','1','1','1','1');";
    $result = mysqli_query($conn,$sql);

    $feature= $_POST['fea_code'];
    $Title_of_the_laboratory = $_POST['lab_code'];
    $major_equipment_details = $_POST['dep_code'];
    $date_of_inaugration = $_POST['doj'];
    $cost_in_lakhs = $_POST['lakhs'];
    $feature=$_POST['feature'];
    $facility_title=$_POST['facility_title'];
    $logo=$_POST['logo'];
    $facilities=$_POST['lab_code'];
    $snapchat=$_POST['lab_code'];
    $hardware_software_equipment=$_POST['lab_code'];
    $incharge1=$_POST['lab_code'];
    $incharge2=$_POST['lab_code'];
    $incharge3=$_POST['lab_code'];
    $supporting_staff=$_POST[''];

    $sql = "insert facilities values($feature,'$Title_of_the_laboratory','$major_equipment_details','$date_of_inaugration','$cost_in_lakhs','$facility_title','$logo','$facilities','$snapchat','$hardware_software_equipment','$incharge1,'$incharge2','$incharge3','$supporting_staff)";
    $result = mysqli_query($conn,$sql);

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

                <div>
                    <h2>New Laboratory</h2>
                    <br>
                    
                </div>
                <div class="row g-3">
                  <div>
                    
                    <div>
                        <div>
                          <p >Welcome Ms.Akila G</p>
                            <div class="col-md-3 offset-md-10 mb-5">
                            
                                <button type="Submit" class="btn btn-primary  " name="submit">view</button>
                            </div>
                        </div>
                    </div>    
                  </div>
                    <div class="col-md-3 mt-6 ml-6 me-7">
                    <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row me-2">
                                <div class="col-md-5">
                              <label for="DeptName" class="form-label">Feature</label>
                            </div>
                              <select id="DeptName" class="form-select" name="DeptName">
                                <option selected>-Select-></option>
                                <option>xx</option>
                                <option>yy</option>
                                <option>zz</option>
                               </select>
                    </div>
                    </div>
                  
                  <div class="col-md-4 ">
                    <label for="Selection_category" class="form-label">Title of the laboratory</label>
                    <br>
                        <div class="col-md-12 ">
                          <input type="text" class="form-control" id="chair" name="Chair">
                        </div>
                  </div>

                <br>
                <div class="col-md-3">
                    <label for="Selection_category" class="form-label">Major Equipment Details</label>
                    <br>
                    <!-- <div class="row mt-2 g-3"> -->
                        <div class="col-md-12 ">
                          <!-- <label for="chair" class="form-label">If Chair,Related to</label> -->
                          <input type="text" class="form-control" id="chair" name="Chair">
                        </div>
                  </div>
                
                <div class="col-md-2  ">

                    <label for="doj" class="form-label">Date of Inaugration</label>
                    <input type="date" class="form-control" id="doj" name="doj">
                </div>
                </div><br>
                <div class="row">
                <div class="col-md-3">
                    <label for="password" class="form-label">Cost in Lakhs</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                <div class="col-md-4">
                  <label for="facility" class="form-label mt-3">Facility title</label>
                  <select id="facility" class="form-select" name="fac_tit">
                    <option selected>-Select-></option>
                    <option>xx</option>
                    <option>yy</option>
                    <option>zz</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="Logo" class="form-label mt-3">Logo</label>
                  <input onclick="f2()" type="file" class="form-control" id="logo" name="logo" >
              </div>
                <div class="col-md-2  ">
                  <label for="name" class="form-label mt-3">Facilities</label>
                  <input type="text " class="form-control" id="facility" name="facility">
              </div>
              </div><br>
              <div class="row">
              <div class="col-md-3">
                <label for="snap" class="form-label mt-3">Snapchat</label>
                <input onclick="f2()" type="file" class="form-control" id="snap" name="snap" >
              </div>
              <div class="col-md-4 ">
                <label for="hse" class="form-label mt-3">hardware/software/equipment details</label>
                <input onclick="f2()" type="file" class="form-control" id="hse" name="hse" >
              </div>

              <div class="col-md-3 offset-md-2">
                <label for="Incharge1" class="form-label mt-3">Incharge 1</label>
                <select id="Incharge1" class="form-select" name="Incharge1">
                  <option selected>-Select-></option>
                  <option>xx</option>
                  <option>yy</option>
                  <option>zz</option>
                </select>
              </div><br>

              <div class="col-md-3">
                <label for="Incharge2" class="form-label mt-3">Incharge 2</label>
                <select id="Incharge2" class="form-select" name="Incharge2">
                  <option selected>-Select-></option>
                  <option>xx</option>
                  <option>yy</option>
                  <option>zz</option>
                </select>
              </div>
            <!-- </div> -->
            <!-- <div class="row"> -->
            
              <div class="col-md-2">
                <label for="Incharge3" class="form-label mt-3">Incharge 3</label>
                <select id="Incharge3" class="form-select" name="Incharge3">
                  <option selected>-Select-></option>
                  <option>xx</option>
                  <option>yy</option>
                  <option>zz</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="supp_staff" class="form-label mt-3">Supporting Staff</label>
                <select id="supp_staff" class="form-select" name="supp_staff">
                  <option selected>-Select-></option>
                  <option>xx</option>
                  <option>yy</option>
                  <option>zz</option>
                </select>
              </div><br>

                <div class="row mx-auto mb-5">
                  <div class="col-md-2 mx-auto">
                      <button type="Submit" class="btn btn-primary btn-lg mt-3" name="submit">Submit</button>
                  </div>
              </div>
              </div>

                
              
            </div>
          </form>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

          <script>
            function myFunction() {
              select = document.getElementById('Designation');
              var option_selected = select.value;
              if (option_selected == "Teaching")
                document.getElementById('Designation_n').innerHTML = '<option value="Head of the Department">Head of the Department</option><option value="Lecturer">Lecturer</option>';
              else if (option_selected == "Non Teaching Technical")
                document.getElementById('Designation_n').innerHTML = '<option value="Instructor">Instructor</option><option value="Lab Assistant">Lab Assistant</option>';
              else
                document.getElementById('Designation_n').innerHTML = '<option value="PA to Principal">PA to Principal</option><option value="Office Assistant">Office Assistant</option>';
            }
          </script>
</body>
<style>
  .form-label {
      font-size: 0.90rem;
  }
</style>

</html>
<?php
include 'endtags.php'
?>