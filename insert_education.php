<?php
// include 'db_conn.php';
// error_reporting(0);

// session_start();

// $sql = "create table if not exists education( id varchar(10) primary key,faculty_code varchar(100),
// department_code varchar(50),
// graduate varchar(50),
// domain varchar(100),
// degree varchar(100),
// institute_university varchar(250))";

// $result = mysqli_query($conn,$sql);

// $faculty_code = "";
// $deparment_code = "";
// $graduate = "";
// $domain = "";
// $degree = "";
// $institute_university = "";

// $sql = "select * from education";
// $result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc($result);

// $faculty_code = $row['faculty_code'];
// $deparment_code = $row['department_code'];
// $graduate = $row['graduate'];
// $domain = $row['domain'];
// $degree = $row['degree'];
// $institute_university = $row['institute_university'];

// if (isset($_POST['submit'])) {

//     $sql = "insert into education values('1','1','1','1','1','1','1');";
//     $result = mysqli_query($conn,$sql);

//     $faculty_code = $_POST['faculty_code'];
//     $department_code = $_POST['dep_code'];
//     $graduate = $_POST['outcomes'];
//     $domain = $_POST['Domain'];
//     $degree = $_POST['Degree'];
//     $institute_university = $_POST['Institude/university'];

//     $sql = "update education set faculty_code ='$faculty_code',department_code='$department_code',graduate='$graduate',domain='$domain',degree='$degree',institute_university='$institute_university' where id='1'";
//     $result = mysqli_query($conn,$sql);
// }
include 'db_conn.php';

error_reporting(0);
    
session_start();
    
if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Faculty') {
    header("Location: new_login.php");
  }
$sql = "create table if not exists education(id int not null auto_increment primary key, facultyy varchar(100),
departmentt varchar(50),
graduatee varchar(20),
domainn varchar(300),
degreee varchar(50),
institutee varchar(20)
)";
$result = mysqli_query($conn, $sql);
    
    // $sql= "insert into announcement values(0,'0','0','0','0','0','0');";
    
    // mysqli_query($conn, $sql);
    
if (isset($_POST['submit'])) {
    
    $faculty = $_POST['faculty_code'];
    $department = $_POST['dep_code'];
    $graduate = $_POST['outcomes'];
    $domain = $_POST['Domain'];
    $degree = $_POST['Degree'];
    $institute = $_POST['Institude/university'];

    $sql ="insert into education(facultyy,departmentt,graduatee,domainn,degreee,institutee) values('$faculty','$department','$graduate','$domain','$degree','$institute')";
    
    $result = mysqli_query($conn, $sql);
        if ($result) {
            try{
                $login_tym = $_SESSION["login_tym"] ;
                $emp_id =  $_SESSION["empid"] ;
                $sql = "select * from education where login_tym ='$login_tym' and emp_id ='$emp_id' ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
    
                $action = $row['action'];
                $form = $row['form'];
    
                $t1 = $action.",inserted education";
                $t2 = $form.", education";
    
    
                $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
            echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
            <h4>Education has been made succesfully</h4>
            </div>';
            } 
            catch(e)
            {
                echo e;    
            }
        // else {
        //         echo "<script>alert('Woops! Something Wrong Went.')</script>";
        //     }
}
}
?>
<?php
include 'appsidebar.php'
?>

                    
            <h2 class="ms-3"><b>Graduation Details</b></h2>
            <div class="main-card m-3 card min-vh-50" style="min-height:60%">
                        <div class="card-body">
            <form method="POST" action="">
            <div class="row ">
                <div class="col">
                    <label for="name"  class="form-label mt-3">Faculty Code</label>
                            <input type="text" class="form-control " id="faculty_code" name="faculty_code">

                </div>
                <div class="col">
                    <label for="name"  class="form-label mt-3">Department Code</label>
                            <input type="text" class="form-control " id="dep_code" name="dep_code">
                </div>
                <div class="col">
                    <label for="name" class="form-label mt-3">Graduate</label>
                    <select onchange="myFunction()" id="Graduate" class="form-select" name="outcomes">
                        <option selected>Choose..</option>
                        <option value="UG">UG</option> 
                        <option value="PG">PG</option>
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label mt-3">Domain</label>
                    <select id="Domain" class="form-select" name="Domain">
                        <option selected>Choose...</option>
                        <option value="s">S</option> 
                        <option value="P">P</option>
                        <option value="PR">PR</option>
                      </select>
                </div>
                <div class="col">
                    <label for="name" class="form-label mt-3">Degree</label>
                    <select id="Degree" class="form-select" name="Degree">
                        <option selected>Choose...</option>
                        <option value="b.tech">b.tech</option> 
                        <option value="b.e">b.e</option>
                        <option value="PR">civil</option>
                      </select>

                </div>
                <div class="col">
                    <label for="name"  class="form-label mt-3">Institute / University</label>
                    <input type="text" class="form-control mb-3 " id="Institude/university" name="Institude/university">

                </div>
            </div>
                
            
                <button type="Submit" class="btn btn-primary mb-4 "  name="submit">Submit</button>
              
            
     

    </div>
</form>

</div>
                </div>
            </div>
        </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>

    <script>

function myFunction()
{
  select = document.getElementById('Graduate');
  var option_selected = select.value;
  if(option_selected=="UG") {
        document.getElementById('Domain').innerHTML='<option value="S">S</option><option value="R">R</option><option value="PR">PR</option>';
        document.getElementById('Degree').innerHTML='<option value="B.E">B.E</option><option value="B.Tech">B.Tech</option>';
  }
  else  {
        document.getElementById('Domain').innerHTML='<option value="T">T</option><option value="O">O</option>';
        document.getElementById('Degree').innerHTML='<option value="M.E">M.E</option><option value="M.Tech">M.Tech</option>';
  }
}
</script>


<script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);
</script>