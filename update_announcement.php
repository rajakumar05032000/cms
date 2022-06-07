<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];


if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Admin') {
    header("Location: new_login.php");
}



$sql = "select * from announcement_details where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $from = $_POST['from'];
    $to = $_POST['to'];
    $doe = $_POST['Date_of_the_Event'];
    $title = $_POST['title_of_the_link'];
    $url=$_POST['URL_to_be_linked'];
    $file=$_POST['File'];
    
    $sql = "update announcement_details set fromm ='$from', tooo='$to', doe = '$doe', title='$title', url = '$url', file = '$file' where id = '$a_id' ";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("Location: update_announcement.php?id=$a_id");
    }

}


?>

<?php
include "appsidebar.php"
?>


<h2 class="ms-3"><b>Announcement Form</b></h2>
                        <div class="main-card m-3 card min-vh-75" style="min-height:50%" style="min-height:60%">
                        <div class="card-body">
                        
                    <form method="POST" action="" class="mx-2">
                        <div class="row">
                                <div class="col">
                                    <label for="name" class="form-label mt-3">From</label>
                                    <input type="date" class="form-control " id="from" name="from" value="<?php echo $row['fromm'] ?>">
                                </div>
                                <div class="col">
        
                                    <label for="name" class="form-label mt-3">To</label>
                                    <input type="date" class="form-control " id="to" name="to" value="<?php echo $row['tooo'] ?>">
                                </div>
                                <div class="col">
                                    <label for="name" class="form-label mt-3">Date of the Event</label>
                                    <input type="date" class="form-control " id="Date_of_the_Event" name="Date_of_the_Event" value="<?php echo $row['doe'] ?>">
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form-label mt-3">Title of the link</label>
                                <textarea class="form-control " id="title_of_the_link" name="title_of_the_link" rows="3"><?php echo $row['title'] ?></textarea>
        
                            </div>
                            <div class="col">
                                <label for="name" class="form-label mt-3">URL to be linked</label>
                                <textarea class="form-control " id="URL_to_be_linked" name="URL_to_be_linked" rows="3"><?php echo $row['url'] ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="name" class="form-label mt-3">File to be linked,if any</label>
                                <input onclick="f2()" type="file" class="form-control" id="File" name="File" value="<?php echo $row['file'] ?>">
                            </div>
                        </div>
                        
                                <button type="Submit" class="btn btn-primary mt-4 mb-4" name="submit">Update</button>
                    
                </form></div>


                </div>
            </div>
        </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script></body>
    </html>

    <?php
    include "endtags.php";
    ?>
    