<?php

include 'db_conn.php';

error_reporting(0);

session_start();



if (isset($_POST['submit'])) {
    $sql = "create table if not exists course_structure( id varchar(10) primary key,outcomes varchar(100),
    text varchar(250),department varchar(100))";

    $result = mysqli_query($conn, $sql);

    $outcomes = $_POST['outcomes'];
    $id = $_POST['id'];
    $text = $_POST["text"];
    $department = $_SESSION['department'];

    $sql = "insert into course_structure values('$id','$outcomes','$text','$department');";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $sql = "update course_structure set outcomes ='$outcomes',text='$text',department='$department' where id='$id'";
        $result1 = mysqli_query($conn, $sql);
        echo "<script>alert('Updated Successfully')</script>";
        if ($result1) {
            echo "<script>alert('Added Successfully')</script>";
            header("Location: course_structure_dashboard.php");
        }
    } else if($result) {
        header("Location: course_structure_dashboard.php");
    }else{
        echo "<script>alert('Error')</script>";
    }
}

?>
<?php
include 'appsidebar.php'
?>
                    <center>
                        <h3>Course Structure</h3>
                    </center>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="name" class="form-label mt-3">Outcomes</label>
                                <select id="outcomes" class="form-select" name="outcomes" value="<?php echo $outcomes; ?>">
                                    <option selected>Choose...</option>
                                    <option value="PROGRAM OUTCOMES">PROGRAM OUTCOMES</option>
                                    <option value="PROGRAM SPECIFIC OUTCOMES">PROGRAM SPECIFIC OUTCOMES</option>
                                    <option value="PROGRAM EDUCATIONAL OBJECTIVES">PROGRAM EDUCATIONAL OBJECTIVE</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-5">
                                <label for="name" class="form-label mt-3 ">Id</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
    
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-7">
                                <label for="name" class="form-label mt-3 mb-3">Text</label>
                                <textarea class="form-control" id="text" name="text" rows="3"><?php echo $text ?></textarea>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col mt-3">
                                <center><button type="Submit" class="btn btn-primary btn-lg" name="submit">Submit</button></center>
                            </div>
                        </div>
                    </form>
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


            function f2() {
                document.getElementById('URL_to_be_linked').disabled = true;
            }
        </script>

</body>

</html>
<?php
include 'endtags.php'
?>