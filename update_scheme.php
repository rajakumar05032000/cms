<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='HOD') {
  header("Location: new_login.php");
}

$sql = "select * from scheme where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $years = $_POST['years'];
    $sem_no = $_POST['sem_no'];
    $departments = $_POST['departments'];
    
    $sql = "update scheme set years ='$years', sem_no='$sem_no', departments = '$departments' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_scheme.php?id=$a_id");
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

          $t1 = $action.",updated scheme";
          $t2 = $form.", scheme form";


          $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
          $result = mysqli_query($conn,$sql);
          echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
              <h4>scheme added successfully</h4>
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
      <center>
        <h4>Scheme Form</h4>
      </center>
      <form method="POST" action="">
        <div class="row">
          <div class="col">
            <label for="name" class="form-label mt-3">Years</label>
            <select id="Years" class="form-select" name="years" onchange="myFunction()">
              <option value="null" selected>Choose..</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
            </select>

          </div>
          <div class="col">
            <label for="name" class="form-label mt-3">Sem no</label>
            <select onchange="myFunction()" id="Sem_no" class="form-select" name="sem_no">
              <option value="null" selected>Choose..</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>


            </select>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="name" class="form-label mt-3">Departments</label>
            <select id="Departments" class="form-select" name="departments" onchange="myFunction()">
              <option value="null" selected>Choose..</option>
              <option value="Mechanical Engineering">Mechanical Engineering</option>
              <option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
              <option value="Mechatronics">Mechatronics</option>
              <option value="Computer Engineering">Computer Engineering</option>
              <option value="Computer Networking">Computer Networking</option>
              <option value="Apparel Technology">Apparel Technology</option>
              <option value="Textile Technology">Textile Technology</option>
              <option value="Foundry Technology">Foundry Technology</option>
            </select>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col">
            <label for="name" class="form-label mt-3">Theory</label>

          </div>
          <div class="col">
            <label for="name" class="form-label mt-3">Practicals</label>
          </div>
        </div> -->

        <!-- <div class="row">
          <div class="col">
            <label for="name" class="form-label mt-3">No of Subjects</label><br>
            <input type="text" class="form-control " id="noofsubs1_code" name="noofsubs1_code"><br>

          </div>

          <div class="col">
            <label for="name" class="form-label mt-3">No of Subjects</label>
            <input type="text" class="form-control " id="noofsubs2_code" name="noofsubs_code">
          </div>
        </div> -->
        <div class="row mb-2" id="subjectContainer">
          <!-- <div class="col-md-3">
            <label for="name" class="form-label mt-0">Subject 3</label>
            <input type="text " class="form-control" id="sub_3" name="sub_3">
          </div> -->
          <div class="col" id="theory_container"></div>
          <div class="col" id="practical_container"></div>
          <center><button type="Submit" class="btn btn-primary my-4" name="submit">update</button></center>
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