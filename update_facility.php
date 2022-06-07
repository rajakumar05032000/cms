<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

$sql = "select * from facility where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $feature= $_POST['DeptName'];
    $title = $_POST['title'];
    $major = $_POST['major'];
    $date = $_POST['date'];
    $cost = $_POST['cost'];
    $facility=$_POST['titlee'];
    $logo=$_POST['logo'];
    $facilities=$_POST['facilities'];
    $snapchat=$_POST['snap'];
    $hardware=$_POST['hse'];
    $incharge=$_POST['Incharge1'];
    $incharge2=$_POST['Incharge2'];
    $incharge3=$_POST['Incharge3'];
    $incharge4=$_POST['supp_staff'];
    $sql = "update facility set featuree ='$feature', titlee='$title', majorr = '$major', datee='$date', costt = '$cost',facilityy ='$facility', logoo='$logo', facilitiess = '$facilities', snapchatt='$snapchat', hardwaree = '$hardware', inchargee = '$incharge', inchargee2='$incharge2', inchargee3 = '$incharge3', inchargee4 = '$incharge4' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_facility.php?id=$a_id");
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

          $t1 = $action.",updated facility";
          $t2 = $form.", deletefacility";


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
<!-- <div> -->
<h2 class="ms-3"><b>Facilities</b></h2>
                    <div class="main-card m-3 card min-vh-100">
                        <div class="card-body">
                    <br>
                    
                <!-- </div> -->
                <div class="row g-3">
                  
                    <div class="col-md-3 ">
                    <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row ">
                                <div class="col-md-3">
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
                  
                  <div class="col-md-3 ">
                    <label for="Selection_category" class="form-label">Title of the Laboratory</label>
                    <br>
                        <div class="col ">
                          <input type="text" class="form-control" id="chair" name="title">
                        </div>
                  </div>

                <br>
                <div class="col-md-3">
                    <label for="Selection_category" class="form-label">Major Equipment Details</label>
                    <br>
                    <!-- <div class="row mt-2 g-3"> -->
                        <div class="col ">
                          <!-- <label for="chair" class="form-label">If Chair,Related to</label> -->
                          <input type="text" class="form-control" id="chair" name="major">
                        </div>
                  </div>
                
                <div class="col-md-3  ">

                    <label for="doj" class="form-label">Date Of Inaugration</label>
                    <input type="date" class="form-control" id="doj" name="date">
                </div>
                </div><br>
                <div class="row">
                <div class="col-md-3">
                    <label for="password" class="form-label mt-3">Cost in Lakhs</label>
                    <input type="text" class="form-control" id="password" name="cost">
                  </div>
                <div class="col-md-3">
                  <label for="facility" class="form-label mt-3">Facility Title</label>
                  <select id="facility" class="form-select" name="titlee">
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
                <div class="col-md-3  ">
                  <label for="name" class="form-label mt-3">Facilities</label>
                  <input type="text " class="form-control" id="facility" name="facilities">
              </div>
              </div><br>
              <div class="row">
              <div class="col-md-3">
                <label for="snap" class="form-label mt-4">Snapchat</label>
                <input onclick="f2()" type="file" class="form-control" id="snap" name="snap" >
              </div>
              <div class="col-md-3">
                <label for="hse" class="form-label mt-2">Hardware/Software Equipment Details</label>
                <input onclick="f2()" type="file" class="form-control" id="hse" name="hse" >
              </div>

              <div class="col-md-3 ">
                <label for="Incharge1" class="form-label mt-4">Incharge 1</label>
                <select id="Incharge1" class="form-select" name="Incharge1">
                  <option selected>-Select-></option>
                  <option>xx</option>
                  <option>yy</option>
                  <option>zz</option>
                </select>
              </div><br>

              <div class="col-md-3">
                <label for="Incharge2" class="form-label mt-4">Incharge 2</label>
                <select id="Incharge2" class="form-select" name="Incharge2">
                  <option selected>-Select-></option>
                  <option>xx</option>
                  <option>yy</option>
                  <option>zz</option>
                </select>
              </div>
            <!-- </div> -->
            <!-- <div class="row"> -->
            
              <div class="col-md-3">
                <label for="Incharge3" class="form-label mt-3">Incharge 3</label>
                <select id="Incharge3" class="form-select" name="Incharge3">
                  <option selected>-Select-></option>
                  <option>xx</option>
                  <option>yy</option>
                  <option>zz</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="supp_staff" class="form-label mt-3">Supporting Staff</label>
                <select id="supp_staff" class="form-select" name="supp_staff">
                  <option selected>-Select-></option>
                  <option>xx</option>
                  <option>yy</option>
                  <option>zz</option>
                </select>
              </div><br>

                <div class="row mx-auto">
                  <div class="col mx-auto">
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
<script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);   
</script>

</html>
<?php
include 'endtags.php'
?>