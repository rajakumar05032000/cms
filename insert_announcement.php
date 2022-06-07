<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


<?php 

include 'db_conn.php';

error_reporting(0);

session_start();


if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Admin') {
    header("Location: new_login.php");
}


$sql = "create table if not exists announcement_details(id int  auto_increment primary key, fromm varchar(100),
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


	
	

    
    $sql ="insert into announcement_details(fromm,tooo,doe,title,url,file) values('$from','$to','$doe','$title',' $url','$file')";
    $result = mysqli_query($conn, $sql);
		if ($result) {
            $login_tym = $_SESSION["login_tym"] ;
            $emp_id =  $_SESSION["empid"] ;
            
            $sql = "select * from log_details where login_tym ='$login_tym' and user ='$emp_id' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $action = $row['action'];
            $form = $row['form'];

            $t1 = $action.",inserted announcement";
            $t2 = $form.", announcement";


            $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and user ='$emp_id'";
            $result = mysqli_query($conn,$sql);
            
            echo '<script type="text/javascript">toastr.success("Announcement has been made Successfully")</script>';
		
			} 
      else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
}

?>

<?php
include 'appsidebar.php'
?>
                        
                        <h2 class="ms-3"><b>Announcement Form</b></h2>
                        <div class="main-card m-3 card min-vh-75" style="min-height:50%" style="min-height:60%">
                        <div class="card-body">
                       
                    <form method="POST" action="" class="mx-2">
                        <div class="row">
                                <div class="col-md-4">
                                    <label for="name" class="form-label mt-3">From</label>
                                    <input type="date" class="form-control " id="from" name="from" >
                                </div>
                                <div class="col-md-4">
        
                                    <label for="name" class="form-label mt-3">To</label>
                                    <input type="date" class="form-control " id="to" name="to" >
                                </div>
                                <div class="col-md-4">
                                    <label for="name" class="form-label mt-3">Date of the Event</label>
                                    <input type="date" class="form-control " id="Date_of_the_Event" name="Date_of_the_Event" >
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label mt-3">Title of the link</label>
                                <textarea class="form-control " id="title_of_the_link" name="title_of_the_link" rows="3"></textarea>

                            </div>
                            <div class="col">
                                <label for="name" class="form-label mt-3">URL to be linked</label>
                                <textarea class="form-control " id="URL_to_be_linked" name="URL_to_be_linked" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <label for="name" class="form-label mt-3">File to be linked,if any</label>
                                <input onclick="f2()" type="file" class="form-control" id="File" name="File" >
                            </div>
                        </div>
                        
                                <button type="Submit" class="btn btn-primary mt-4 mb-4" name="submit">Submit</button>
                    
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
<style>
  #announcement_style
  {
    background-color: rgb(135,206,235);
  }
  </style>
</body>
    </html>
    