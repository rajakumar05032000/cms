<?php
include 'db_conn.php';
error_reporting(0);

session_start();

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Faculty') {
    header("Location: new_login.php");
  }
$sql = "create table if not exists education( id varchar(10) primary key,faculty_code varchar(100),
department_code varchar(50),
graduate varchar(50),
domain varchar(100),
degree varchar(100),
institute_university varchar(250))";

$result = mysqli_query($conn,$sql);

$faculty_code = "";
$deparment_code = "";
$graduate = "";
$domain = "";
$degree = "";
$institute_university = "";

$sql = "select * from education";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$faculty_code = $row['faculty_code'];
$deparment_code = $row['department_code'];
$graduate = $row['graduate'];
$domain = $row['domain'];
$degree = $row['degree'];
$institute_university = $row['institute_university'];

if (isset($_POST['submit'])) {

    $sql = "insert into education values('1','1','1','1','1','1','1');";
    $result = mysqli_query($conn,$sql);

    $faculty_code = $_POST['faculty_code'];
    $department_code = $_POST['dep_code'];
    $graduate = $_POST['outcomes'];
    $domain = $_POST['Domain'];
    $degree = $_POST['Degree'];
    $institute_university = $_POST['Institude/university'];

    $sql = "update education set faculty_code ='$faculty_code',department_code='$department_code',graduate='$graduate',domain='$domain',degree='$degree',institute_university='$institute_university' where id='1'";
    $result = mysqli_query($conn,$sql);
}

?>
<?php
include 'appsidebar.php'
?>
                    
            <center><h3>Graduation Details</h3></center>
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
            </div>
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Graduate</label>
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
            </div>
            <div class="row">
                <div class="col">
                    <label for="name"  class="form-label mt-3 mb-3">Institute / University</label>
                    <input type="text" class="form-control mb-3 " id="Institude/university" name="Institude/university">

                </div>
            </div>
                
            
                <center><button type="Submit" class="btn btn-primary mb-4 "  name="submit">Submit</button></center>
              
            
     

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




</body>
    </html>