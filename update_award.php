<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

$sql = "select * from award where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $faculty = $_POST['outcomes'];
    $department = $_POST['outcomes1'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $award = $_POST['award'];
    $image = $_POST['image1'];
    
    $sql = "update award set facultyy ='$faculty', departmentt='$department', titlee = '$title', datee='$date', awardd = '$award', imagee = '$image' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_award.php?id=$a_id");
    }

}


?>

<?php
include 'appsidebar.php'
?>
                        <center><h3>Award Received</h3></center>
                        <form method="POST" action="" enctype="multipart/form-data">

                        <div class="row justify-content-start">
                            <div class="col-md-3">
                                <label for="faculty" class="form-label mt-3">Faculty Details</label>
                                <select id="outcomes" class="form-select" name="outcomes" value="<?php echo $row['facultyy'] ?>"
                                    <option selected>Choose...</option>
                                    <option value="sudha">sudha</option>
                                    <option value="prabhu">prabhu</option>
                                    <option value="yash">yash</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="dept" class="form-label mt-3">Department</label>
                                <select id="outcomes" class="form-select" name="outcomes1" value="<?php echo $row['departmentt'] ?>" 
                                    <option selected>Choose...</option>
                                    <option value="ECE">ECE</option>
                                    <option value="IT">IT</option>
                                    <option value="CSE">CSE</option>
                                </select>
                            </div>
                            <div class="row  mt-5 me-2 justify-content-start">
                                <div class="col-md-3">
                                    <label for="title" class="form-label">Title of the award</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['titlee'] ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['datee'] ?>">
                                </div>
                            </div>
                            <div class="row  mt-5 me-2 justify-content-start">
                                <div class="col-md-3">
                                    <label for="award" class="form-label">Award by</label>
                                    <input type="text" class="form-control" id="award" name="award" value="<?php echo $row['awardd'] ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="image1" class="form-label">image upload</label>
                                    <input type="file" class="form-control" id="image1" name="image1" value="<?php echo $row['imagee'] ?>">
                                </div>
                            </div>
                            <div class="row mx-auto ">
                                <div class="col mt-4 mx-auto">
                                <center><button type="Submit" class="btn btn-primary"  name="submit">update</button></center>
                                </div>
                            </div>
                        </div>

                           
                            