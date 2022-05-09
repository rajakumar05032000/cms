<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

$sql = "select * from upload where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $title = $_POST['title'];
    $brief = $_POST['brief'];
    $image = $_POST['image1'];
    $image_main = $_POST['image2'];
    
    $sql = "update upload set datee ='$date', titlee='$title', brieff = '$brief', imagee='$image', imagee_mainn = '$image_main' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_upload.php?id=$a_id");
    }

}


?>
<?php
include 'appsidebar.php'
?>
                        <center><h3>Upload</h3></center>
                        <form method="POST" action="" enctype="multipart/form-data">

                        <div class="row mt-5 me-2 justify-content-start">
                            <div class="col-md-5">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['datee'] ?>">
                            </div>
                                <div class="col-md-5">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['titlee'] ?>">
                                </div>
                        </div>
                        <div class="row mt-5">
                                <div class="col-md-10 ">
                                    <label for="brief" class="form-label">In Brief</label>
                                    <input type="text" class="form-control " id="brief" name="brief" rows="5" value="<?php echo $row['brieff'] ?>">
                                </div>
                        </div>
                        <div class="row mt-5 me-2 justify-content-start">
                            <div class="col-md-5">
                                <label for="image1" class="form-label">Upload image to be displayed in Main page</label>
                                <input type="file" class="form-control" id="image1" name="image1" value="<?php echo $row['imagee'] ?>">
                            </div>
                            <div class="col-md-5">
                                <label for="image2" class="form-label">Upload image gallery</label>
                                <input type="file" class="form-control" id="image2" name="image2" value="<?php echo $row['imagee_mainn'] ?>">
                            </div>
                        </div>
                        <div class="row mx-auto ">
                            <div class="col mt-4 mx-auto">
                            <center><button type="Submit" class="btn btn-primary"  name="submit">update</button></center>
                            </div>
                        </div>

</body>