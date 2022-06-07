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

// $sql= "insert into announcement values(0,'0','0','0','0','0','0');";

// mysqli_query($conn, $sql);

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
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registration-Form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/reg/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/reg_main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/staff_register.css">
</head>
    
<body>
        <div class="container-login100 " style="background-image: url('images/img-01.jpg');">
            <div class="container card p-4 col-md-12" >
                <center><h1>Announcement Form</h1></center>
                <div class="row">
                    <div class="col">
                        <label for="name" class="form-label mt-3">Announcement should be active:</label>
                    </div>
                </div>
            <form method="POST" action="">
                <div class="row">
                        <div class="col">
                            <label for="name"  class="form-label mt-3">From</label>
                            <input type="date" class="form-control " id="from" name="from">
                        </div>
                        <div class="col">

                            <label for="name" class="form-label mt-3">To</label>
                            <input type="date" class="form-control " id="to" name="to">
                        </div>
                        <div class="col">
                            <label for="name" class="form-label mt-3">Date of the Event</label>
                            <input type="date" class="form-control " id="Date_of_the_Event" name="Date_of_the_Event">
                        </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="name"  class="form-label mt-3">Title of the link</label>
                        <textarea class="form-control " id="title_of_the_link" name="title_of_the_link" rows="5"></textarea>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="name"  class="form-label mt-3">URL to be linked</label>
                        <textarea class="form-control " id="URL_to_be_linked" name="URL_to_be_linked" rows="5"></textarea>
                    </div>
                    <div class="col">
                        <label for="name"  class="form-label mt-3">File to be linked,if any</label>
                        <input onclick="f2()" type="file" class="form-control" id="File" name="File">
                    </div>
                </div>
                
                        <center><button type="Submit" class="btn btn-primary mt-4"  name="submit">Submit</button></center>
            
        </div>
    
            </div>
        </div>
</form>

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>