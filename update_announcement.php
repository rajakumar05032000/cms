<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

$sql = "select * from announcement where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $from = $_POST['from'];
    $to = $_POST['to'];
    $doe = $_POST['Date_of_the_Event'];
    $title = $_POST['title_of_the_link'];
    $url=$_POST['URL_to_be_linked'];
    $file=$_POST['File'];
    
    $sql = "update announcement set fromm ='$from', tooo='$to', doe = '$doe', title='$title', url = '$url', file = '$file' where id = '$a_id' ";
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


                        <center><h1 class="mt-3">Announcement Form</h1></center>
                        <div class="row">
                            <div class="col mx-2">
                                <label for="name" class="form-label mt-3">Announcement should be active:</label>
                            </div>
                        </div>
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
                                <textarea class="form-control " id="title_of_the_link" name="title_of_the_link" rows="5"><?php echo $row['title'] ?></textarea>
        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form-label mt-3">URL to be linked</label>
                                <textarea class="form-control " id="URL_to_be_linked" name="URL_to_be_linked" rows="5"><?php echo $row['url'] ?></textarea>
                            </div>
                            <div class="col">
                                <label for="name" class="form-label mt-3">File to be linked,if any</label>
                                <input onclick="f2()" type="file" class="form-control" id="File" name="File" value="<?php echo $row['file'] ?>">
                            </div>
                        </div>
                        
                                <center><button type="Submit" class="btn btn-primary mt-4 mb-4" name="submit">Update</button></center>
                    
                </form></div>


                </div>
            </div>
        </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script></body>
    </html>

    <?php
    include "endtags.php";
    ?>
    