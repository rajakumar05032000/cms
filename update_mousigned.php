<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

$sql = "select * from mousigned where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $collaborating = $_POST['org'];
    $date = $_POST['date'];
    $gallery = $_POST['image1'];
    $description = $_POST['des'];
    
    $sql = "update mousigned set collaboratingg ='$collaborating', datee='$date', galleryy = '$gallery', descriptionn='$description' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_mousigned.php?id=$a_id");
    }

}


?>



<?php
include 'appsidebar.php'
?>
                        <center><h3>Mou signed </h3></center>
                        <form method="POST" action="" enctype="multipart/form-data">

                        <div class="row  mt-5 me-2 justify-content-start">
                            <div class="col-md-3">
                                <label for="org" class="form-label">collaborating organization</label>
                                <input type="text" class="form-control" id="org" name="org" value="<?php echo $row['collaboratingg'] ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['datee'] ?>">
                            </div>
                        </div>
                            <div class="row mt-5 me-2 justify-content-start">
                                <div class="col-md-3">
                                    <label for="image1" class="form-label">gallery</label>
                                    <input type="file" class="form-control" multiple id="image1" name="image1" value="<?php echo $row['galleryy'] ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="des" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="des" name="des" value="<?php echo $row['descriptionn'] ?>">
                                </div>
                            </div>
                            <div class="row mx-auto ">
                                <div class="col mt-4 mx-auto">
                                <center><button type="Submit" class="btn btn-primary"  name="submit">update</button></center>
                                </div>
                            </div>

    