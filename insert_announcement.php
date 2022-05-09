<?php 

include 'db_conn.php';

error_reporting(0);

session_start();

$sql = "create table if not exists announcement(id int not null auto_increment primary key, fromm varchar(100),
    tooo varchar(50),
    doe varchar(20),
    title varchar(300),
    url varchar(300),
    file varchar(100)
    )";
$result = mysqli_query($conn, $sql);

if (isset($_POST['submit'])) {

$from = $_POST['from'];
$to = $_POST['to'];
$doe = $_POST['Date_of_the_Event'];
$title = $_POST['title_of_the_link'];
$url=$_POST['URL_to_be_linked'];
$file=$_POST['File'];


	
	

    
    $sql ="insert into announcement(fromm,tooo,doe,title,url,file) values('$from','$to','$doe','$title',' $url','$file')";

    $result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Announcement has been made Successfully')</script>";
			} 
      else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
}

?>

<?php
include 'appsidebar.php'
?>
                        
                        <center><h3>Announcement Form</h3></center>
                        <div class="row">
                            <div class="col mx-2">
                                <label for="name" class="form-label mt-3">Announcement should be active:</label>
                            </div>
                        </div>
                    <form method="POST" action="" class="mx-2">
                        <div class="row">
                                <div class="col">
                                    <label for="name" class="form-label mt-3">From</label>
                                    <input type="date" class="form-control " id="from" name="from" >
                                </div>
                                <div class="col">
        
                                    <label for="name" class="form-label mt-3">To</label>
                                    <input type="date" class="form-control " id="to" name="to" >
                                </div>
                                <div class="col">
                                    <label for="name" class="form-label mt-3">Date of the Event</label>
                                    <input type="date" class="form-control " id="Date_of_the_Event" name="Date_of_the_Event" >
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form-label mt-3">Title of the link</label>
                                <textarea class="form-control " id="title_of_the_link" name="title_of_the_link" rows="5"></textarea>
        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form-label mt-3">URL to be linked</label>
                                <textarea class="form-control " id="URL_to_be_linked" name="URL_to_be_linked" rows="5"></textarea>
                            </div>
                            <div class="col">
                                <label for="name" class="form-label mt-3">File to be linked,if any</label>
                                <input onclick="f2()" type="file" class="form-control" id="File" name="File" >
                            </div>
                        </div>
                        
                                <center><button type="Submit" class="btn btn-primary mt-4 mb-4" name="submit">Submit</button></center>
                    
                </form></div>
                </div>


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
    