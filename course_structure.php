<?php

include 'db_conn.php';

error_reporting(0);

session_start();


$sql = "create table if not exists course_structure( id1 varchar(10) primary key,outcomes varchar(100),
id varchar(50),
text varchar(250))";

$result = mysqli_query($conn,$sql);

$outcomes = "";
$id = "";
$text = "";

$sql = "select * from course_structure";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$outcomes = $row['outcomes'];
$id = $row['id'];
$text = $row["text"];

if (isset($_POST['submit'])) {

    $sql = "insert into course_structure values('1','1','1','1');";
    $result = mysqli_query($conn,$sql);
    

$outcomes = $_POST['outcomes'];
$id = $_POST['id'];
$text = $_POST["text"];



$sql = "update course_structure set outcomes ='$outcomes',id='$id',text='$text'where id1='1'";
$result = mysqli_query($conn,$sql);

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
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/reg/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/reg_main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/staff_register.css">
</head>

<body>
    <div class="container-login100" style="background-image: url('images/img-01.jpg');">
        <div class="container card col-md-4 ">
            <form>
                <center>
                    <h1>Course Structure</h1>
                </center>

                <div class="row">
                    <div class="col-md-7 ms-3">
                        <label for="name" class="form-label mt-3">Outcomes</label>
                        <select id="outcomes" class="form-select" name="outcomes" value="<?php echo $outcomes;?>">
                            <option selected>Choose...</option>
                            <option value="PROGRAM OUTCOMES">PROGRAM OUTCOMES</option>
                            <option value="PROGRAM SPECIFIC OUTCOMES">PROGRAM SPECIFIC OUTCOMES</option>
                            <option value="PROGRAM EDUCATIONAL OBJECTIVES">PROGRAM EDUCATIONAL OBJECTIVE</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 ms-3">
                        <label for="name" class="form-label mt-3">Program Outcomes ID</label>
                        <select id="outcomes" class="form-select" name="outcomes" value="<?php echo $outcomes;?>">
                            <option selected>Choose...</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">1</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">2</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">3</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">4</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">5</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">6</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">7</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">8</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">9</option>
                            <option value="PROGRAM OUTCOMES" id="outcomes" onclick="clicked()">10</option>
                            
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 ms-3">
                        <label for="name" class="form-label mt-3 ">Id</label>
                        <input type="text" class="form-control " id="id" name="id" value="<?php echo $id;?>">

                    </div>
                </div>

                <div class="row">
                    <div class="col ms-3">
                        <label for="name" class="form-label mt-3 col-md-7 mb-3" onclick="clicked(10)">Text</label>
                        <div class="dynamicTextContainer">
                            <textarea class="form-control mb-3 me-3" name="text"
                                rows="3"><?php echo $text?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto mb-3">
                    <div class="col-md-7 mx-auto">
                        <button type="Submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
                    </div>
                </div>
            </form>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>

            <script>
                // (function (){
                //     var sel = document.getElementById('outcomes');
                //     function click(sel){
                //         var opt;
                //         for(var i=0,len=sel.option.length;i<len;i++){
                //             opt=sel.options[i];
                //             if(opt.selected ===true){
                //                 break;
                //             }
                //         }
                //         return opt;
                //     }
                // }());
                var sel1=document.getElementById('outcomes');
                function clicked(sel1) {
                    const textContainer = document.querySelector(".dynamicTextContainer");
                    while (textContainer.firstChild) {
                        textContainer.removeChild(textContainer.firstChild);
                    }
                    for(let i=0;i<count;i++){
                        const TA = document.createElement("textarea")
                        TA.className="form-control mb-3 me-3"
                        textContainer.appendChild(TA)
                    }

                }
            </script>
</body>

</html>
