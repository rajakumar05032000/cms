<?php 

include 'db_conn.php';

error_reporting(0);

session_start();
include 'appsidebar.php';
$a_id = $_GET['id'];
$id = $a_id;
$sql = "select * from student_publication where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);



$title = $row['title'];
$journal = $row['journal'];
$guide = $row['guide'];
$sname = $row['sname'];
$srollno = $row['srollno'];
$count = $row['count'];
$date = $row['date'];
$sname = json_decode($sname,true);
$srollno = json_decode($srollno,true);

$ff = "";
for($i=0;$i<$count;$i++)
{ 
    $ff .= '<div class="row mt-3"'. " id=s$i ".'><div class="col-md-3"><label for="" class="form-label ">Name</label><input type="text " class="form-control" id="sname[]" name="sname[]" '."value=\"$sname[$i]\"".'></div>'.'<div class="col-md-3"><label for="" class="form-label ">Roll no</label><input type="text " class="form-control" id="srol[]" name="srol[]" '."value=\"$srollno[$i]\"".'></div><div class="col-md-3 mt-2"><button type="button" class="btn btn-danger mt-4 " name="delete" onclick=deleteentry('.$i.')>Delete</button></div></div>';
}



if (isset($_POST['submit'])) {

    
     
    $json = json_encode($_POST, JSON_FORCE_OBJECT);
    $data = json_decode($json);

    $students_name_json = json_encode($data->sname,JSON_FORCE_OBJECT);
    $students_roll_json = json_encode($data->srol,JSON_FORCE_OBJECT);

    $Title = $_POST['Title'];
    $Journal = $_POST['journal'];
    $count = $_POST['count'];
    $Guide = $_POST['Guide'];
    $datepub = $_POST['datepub'];
    
    

    
    

    $sql = "update student_publication set guide ='$Guide', title = '$Title', journal='$Journal',count='$count',sname='$students_name_json',srollno='$students_roll_json',date='$datepub' where id='$id'";    
    $result = mysqli_query($conn,$sql);

    if ($result) {
        $login_tym = $_SESSION["login_tym"] ;
        $emp_id =  $_SESSION["empid"] ;
        
        $sql = "select * from log_details where login_tym ='$login_tym' and user ='$emp_id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $action = $row['action'];
        $form = $row['form'];

        $t1 = $action.",updated student_publication";
        $t2 = $form.", student_publication";


        $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and user ='$emp_id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('Student Publication details updated Successfully')</script>";
        } 
  else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }

}


?>


<h2 class="ms-3 mt-2"><b>Student Publication</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">

<form method="POST" action="" enctype="multipart/form-data">

<div class="row">
 <div class="col-md-3">
<label for="" class="form-label ">Title</label>
<input type="text " class="form-control" id="Title" name="Title" value="<?php echo $title; ?>">
</div>

 <div class="col-md-3">
<label for="journal" class="form-label ">Journal</label>
<select  id="journal" class="form-select" name="journal">
<option selected="">Choose...</option>
<option value="IEEE" <?php if ($journal == 'IEEE') echo ' selected="selected"'; ?>>IEEE</option> 
<option value="URE" <?php if ($journal == 'URE') echo ' selected="selected"'; ?>>URE</option>
<option value="CJJ" <?php if ($journal == 'CJJ') echo ' selected="selected"'; ?>>CJJ</option>
</select>
</div>

 <div class="col-md-2">
<label for="" class="form-label ">No. of. Students</label>
<input type="text " class="form-control" id="count" name="count" value="<?php echo $count; ?>">
</div>

 <div class="col-md-2">
<label for="" class="form-label ">Guide</label>
<input type="text " class="form-control" id="Guide" name="Guide" value="<?php echo $guide; ?>">
</div>

<div class="col-md-2 pe-1">
<label for="date" class="form-label">Date</label>
<input type="date" class="form-control" id="date" name="datepub" value="<?php echo $date; ?>"></div>
</div>

<div class="row mt-3" id="roll"></div>

<button type="button" class="btn btn-primary btn-lg mt-4 mb-4 " id="addbt" name="Addbt">Add Student </button>
<button type="Submit" class="btn btn-primary btn-lg mb-4 mt-4 ms-4 " name="submit">Submit</button>


</form>

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
$("#roll").prepend(fx);
</script>

<script>
    $("#addbt").on('click',()=>{

        txt2 = `<div class="row" id=s${countjs}>              <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Name</label>
                                    <input type="text " class="form-control" id="sname" name="sname[]">
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label mt-3">Roll no</label>
                                    <input type="text " class="form-control" id="srol" name="srol[]">
                                </div>
                                
                                <div class="col-md-3 mt-4"><button type="button" class="btn btn-danger mt-4 " name="delete" onclick=deleteentry(${countjs})>Delete</button></div>
                                </div>
                                `
       $("#roll").append(txt2);
       countjs++;
       document.getElementById('count').value = ++document.getElementById('count').value;
    })
</script>




