<?php 

include 'db_conn.php';

error_reporting(0);

session_start();
include 'appsidebar.php';

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Web Incharge') {
    header("Location: new_login.php");
  }

$a_id = $_GET['id'];
$id = $a_id;
$sql = "select * from training_program where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);


$type = $row['type'];
$fors = $row['fors'];
$start_date = $row['start_date'];
$end_date = $row['end_date'];
$title = $row['title'];
$speakername = $row['speaker'];
$description = $row['description'];

$speakername = json_decode($speakername,true);
$description = json_decode($description,true);

$count = count($speakername);

$ff = "";
for($i=0;$i<$count;$i++)
{ 
    $ff .= '<div class="row mt-3"'. " id=s$i ".'><div class="col-md-3"><label for="" class="form-label ">Speaker Name</label><input type="text " class="form-control" id="speaker_name[]" name="speaker_name[]" '."value=\"$speakername[$i]\"".'></div>'.'<div class="col-md-3"><label for="" class="form-label ">Description</label><input type="text " class="form-control" id="description[]" name="description[]" '."value=\"$description[$i]\"".'></div><div class="col-md-3 mt-2"><button type="button" class="btn btn-danger mt-4 " name="delete" onclick=deleteentry('.$i.')>Delete</button></div></div>';
}



if (isset($_POST['submit'])) {

    
    $json = json_encode($_POST, JSON_FORCE_OBJECT);
    $data = json_decode($json);

    $speaker_name_json = json_encode($data->speaker_name,JSON_FORCE_OBJECT);
    $description_json = json_encode($data->description,JSON_FORCE_OBJECT);

    $type = $_POST['Type'];
    $fors = $_POST['fors'];
    $start_date = $_POST['dos'];
    $end_date = $_POST['doe'];
    $title = $_POST['title'];
    

    $tmpFilePath = $_FILES['pdf']['tmp_name'];
    $rfile_name_pdf = 'internsip_'.$deptname.'-'.date('m-d-Y-His').$_FILES["pdf"]['name'];
    move_uploaded_file($tmpFilePath, "images/".$deptname."/internship"."/".$batch."/".$rfile_name_pdf);

    $sql = "update training_program set type ='$type', description = '$description_json', speaker='$speaker_name_json',fors='$fors',start_date='$start_date',end_date='$end_date' where id='$id'";    
    $result = mysqli_query($conn,$sql);

    if ($result) {
        $login_tym = $_SESSION["login_tym"] ;
        $emp_id =  $_SESSION["empid"] ;
        
        $sql = "select * from log_details where login_tym ='$login_tym' and user ='$emp_id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $action = $row['action'];
        $form = $row['form'];

        $t1 = $action.",updated training_program";
        $t2 = $form.", training_program";


        $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and user ='$emp_id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('Training_program details updated Successfully')</script>";
        } 
  else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }

}


?>



<h2 class="ms-3 mt-2"><b>Training Program</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Type</label>
                                    <select  id="Type" class="form-select" name="Type">
                                        <option selected="">Choose...</option>
                                        <option value="Inhouse" <?php if ($type == 'Inhouse') echo ' selected="selected"'; ?>>Inhouse</option> 
                                        <option value="Company" <?php if ($type == 'Company') echo ' selected="selected"'; ?>>Company</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Faculty / Students</label>
                                    <select  id="fors" class="form-select" name="fors">
                                        <option selected="">Choose...</option>
                                        <option value="Faculty" <?php if ($fors == 'Faculty') echo ' selected="selected"'; ?>>Faculty</option> 
                                        <option value="Student" <?php if ($fors == 'Student') echo ' selected="selected"'; ?>>Student</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label for="dos" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="dos" name="dos" value='<?php echo $start_date;?>'>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label for="doe" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="doe" name="doe"  value='<?php echo $end_date;?>'>
                                </div>
                            </div>

                            <div class="row mt-4">
                                
                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Title of Training Programme</label>
                                    <input type="text " class="form-control" id="title" name="title"  value='<?php echo $title;?>'>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <label for="name" class="form-label">Upload PDF</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf"  value='<?php echo $rfile_name_pdf;?>'>
                                </div>

                            </div>

                            <div id="toadd" class="row"></div>


                            <div class="row mt-4">
                                <div class="col-md-12 ">
                                    <button type="button" class="btn btn-primary btn-lg mb-4 " id="addbt" name="Addbt">Add Industry </button>
                                    <button type="Submit" class="btn btn-primary btn-lg mb-4 ms-5" name="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div
                </div>
            </div>
        </div>




<?php
include 'endtags.php';
?>


<script>
var countjs = <?php echo $count ;?>;
function deleteentry(a)
{
    var b = "s"+a;
    elem = document.getElementById(b);
    elem.remove();
    document.getElementById('count').value = --document.getElementById('count').value;
}
</script>

<script>
var fx = '<?php echo $ff?>';    
$("#toadd").prepend(fx);
</script>

<script>
    $("#addbt").on('click',()=>{

        txt2 = `<div class="row" id=s${countjs}>              <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Speaker Name</label>
                                    <input type="text " class="form-control" id="sname" name="speaker_name[]">
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Description</label>
                                    <input type="text " class="form-control" id="srol" name="description[]">
                                </div>
                                
                                <div class="col-md-3 mt-4"><button type="button" class="btn btn-danger mt-4 " name="delete" onclick=deleteentry(${countjs})>Delete</button></div>
                                </div>
                                `
       $("#toadd").append(txt2);
       countjs++;
    })
</script>




