<?php

include 'db_conn.php';

error_reporting(0);

session_start();


if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Admin') {
    header("Location: new_login.php");
}



$sql = "create table if not exists counts(id varchar(10) primary key,students varchar(100),
qualified_faculty varchar(50),
classroom varchar(20),
laboratories varchar(20))";

$result = mysqli_query($conn,$sql);



$students = "";
$qualified_faculty = "";
$classroom = "";
$lab = "";

$sql = "select * from counts";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$students = $row['students'];
$qualified_faculty = $row['qualified_faculty'];
$classroom = $row["classroom"];
$lab = $row["laboratories"];


if (isset($_POST['submit'])) {

$sql = "insert into counts values('1','1','1','1','1');";
$result = mysqli_query($conn,$sql);

$students = $_POST['students'];
$qualified_faculty = $_POST['Qualified_Faculty'];
$classroom = $_POST["Classroom"];
$lab = $_POST["Laboratories"];


$sql = "update counts set students ='$students',qualified_faculty='$qualified_faculty',classroom='$classroom',laboratories='$lab' where id='1'";

$result = mysqli_query($conn,$sql);

}

?>

<?php 
include 'appsidebar.php'
?>
                 <!-- <div class="card-body"> -->
                    <center><h3>Count Form</h3></center>
                    
            <div class="row ">
                <div class="col-md-3">
                    <label for="name" class="form-label">Students</label>
                    <input type="text" class="form-control" id="students" name="students" value="<?php echo $students;?>">
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label ">Qualified Faculty</label>
                    <input type="text"class="form-control" id="Qualified_Faculty" name="Qualified_Faculty" value="<?php echo $qualified_faculty;?>">
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label ">Classroom</label>
                    <input type="text" class="form-control" id="Classroom" name="Classroom" value="<?php echo $classroom;?>">
                </div>

                <div class="col-md-3">
                    <label for="name" class="form-label">Laboratories</label>
                    <input type="text" class="form-control" id="Laboratories" name="Laboratories" value="<?php echo $lab;?>">
                </div>
            </div>

            <div class="row mx-auto ">
                <div class="col mt-4 mx-auto"><br><br>
                <center><button type="Submit" class="btn btn-primary"  name="submit">Submit</button></center>
                </div>
            </div>
            </form>
        </section>
    </div>
</div

                </div>
            </div>
        </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>

    <script>
    const input = document.getElementById('URL_to_be_linked');

    input.addEventListener('input', updateValue);

    function updateValue(e) {
         document.getElementById('File').disabled = true;
    }


    function f2()
    {
        document.getElementById('URL_to_be_linked').disabled = true;
    }
    </script>

</body>
    </html>