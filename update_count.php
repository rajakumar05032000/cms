<?php
include 'db_conn.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Admin') {
    header("Location: new_login.php");
  }
$a_id = $_GET['id'];

$sql = "select * from counts where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $students = $_POST['students'];
    $qualified_faculty = $_POST['Qualified_Faculty'];
    $classroom = $_POST["Classroom"];
    $lab = $_POST["Laboratories"];
    
    $sql = "update counts set students ='$students', qualified_faculty='$qualified_faculty', classroom = '$classroom', laboratories='$lab' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_count.php?id=$a_id");
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

            $t1 = $action.",updated count";
            $t2 = $form.", count form";


            $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
            $result = mysqli_query($conn,$sql);
            echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
                <h4>count added successfully</h4>
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
                 <!-- <div class="card-body"> -->
                   <h2 class="ms-3"><b>Count Form</b></h1>
                   <div class="main-card m-3 card min-vh-100">
                        <div class="card-body">
                    
            <div class="row ">
                <div class="col-md-3">
                    <label for="name" class="form-label">Students</label>
                    <input type="text" class="form-control" id="students" name="students" value="<?php echo $row['students'] ?>">
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label ">Qualified Faculty</label>
                    <input type="text"class="form-control" id="Qualified_Faculty" name="Qualified_Faculty" value="<?php echo $row['qualified_faculty'] ?>">
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label ">Classroom</label>
                    <input type="text" class="form-control" id="Classroom" name="Classroom" value="<?php echo $row['classroom'] ?>">
                </div>

                <div class="col-md-3">
                    <label for="name" class="form-label">Laboratories</label>
                    <input type="text" class="form-control" id="Laboratories" name="Laboratories" value="<?php echo $row['laboratories'] ?>">
                </div>
            </div>

            <div class="row mx-auto ">
                <div class="col mt-4 mx-auto"><br><br>
                <button type="Submit" class="btn btn-primary"  name="submit">update</button>
                </div>
            </div>
            </form>
        </section>
    </div>
</div>

</div>
</div>
</div>
<script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);   
</script>
</body>
</html>