<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Faculty') {
    header("Location: new_login.php");
  }
$sql = "select * from education where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $faculty = $_POST['faculty_code'];
    $department = $_POST['dep_code'];
    $graduate = $_POST['outcomes'];
    $domain = $_POST['Domain'];
    $degree = $_POST['Degree'];
    $institute = $_POST['Institude/university'];
    
    $sql = "update education set facultyy ='$faculty', departmentt='$department', graduatee = '$graduate', domainn='$domain', degreee = '$degree', institutee = '$institute' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if ($result) {  
        try{
            $login_tym = $_SESSION["login_tym"] ;
            $emp_id =  $_SESSION["empid"] ;
            $sql = "select * from log_details where login_tym ='$login_tym' and emp_id ='$emp_id' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $action = $row['action'];
            $form = $row['form'];

            $t1 = $action.",updated education";
            $t2 = $form.", education";


            $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
            $result = mysqli_query($conn,$sql);
            echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                <h4>education added successfully</h4>
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
                    
            <h1 class="ms-3">Graduation Details</h1>
            <div class="main-card m-3 card min-vh-100">
                        <div class="card-body">
            <form method="POST" action="">
            <div class="row ">
                <div class="col">
                    <label for="name"  class="form-label mt-3">Faculty Code</label>
                            <input type="text" class="form-control " id="faculty_code" name="faculty_code" value="<?php echo $row['facultyy']?>">

                </div>
                <div class="col">
                    <label for="name"  class="form-label mt-3">Department Code</label>
                            <input type="text" class="form-control " id="dep_code" name="dep_code" value="<?php echo $row['departmentt']?>">

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Graduate</label>
                    <select onchange="myFunction()" id="Graduate" class="form-select" name="outcomes" value="<?php echo $row['graduatee']?>">
                        <option selected>Choose..</option>
                        <option value="UG">UG</option> 
                        <option value="PG">PG</option>
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label mt-3">Domain</label>
                    <select id="Domain" class="form-select" name="Domain" value="<?php echo $row['domainn']?>">
                        <option selected>Choose...</option>
                        <option value="s">S</option> 
                        <option value="P">P</option>
                        <option value="PR">PR</option>
                      </select>
                </div>
                <div class="col">
                    <label for="name" class="form-label mt-3">Degree</label>
                    <select id="Degree" class="form-select" name="Degree" value="<?php echo $row['degreee']?>">
                        <option selected>Choose...</option>
                        <option value="b.tech">b.tech</option> 
                        <option value="b.e">b.e</option>
                        <option value="PR">civil</option>
                      </select>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="name"  class="form-label mt-3 mb-3">Institute / University</label>
                    <input type="text" class="form-control mb-3 " id="Institude/university" name="Institude/university" value="<?php echo $row['institutee']?>">

                </div>
            </div>
                
            
                <button type="Submit" class="btn btn-primary mb-4 "  name="submit">update</button>
              
            
     

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
</body>
</html>