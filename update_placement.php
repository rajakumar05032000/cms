<?php 

include 'db_conn.php';

error_reporting(0);

session_start();
include 'appsidebar.php';
$a_id = $_GET['id'];
$id = $a_id;

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Web Incharge') {
    header("Location: new_login.php");
  }

$sql = "select * from placement where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);



$batch = $row['year'];
$company_title = $row['company_title'];
$count = $row['count'];
$sname = $row['sname'];
$srollno = $row['srollno'];
$type = $row['type'];
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

    $year = $_POST['year'];
    $company_title = $_POST['company_title'];
    $count = $_POST['count'];
    
    $sql = "update placement set year = '$year',company_title='$company_title',count='$count',sname='$students_name_json',srollno='$students_roll_json' where id='$id'" ;    
    $result = mysqli_query($conn,$sql);


    if ($result) {
        $login_tym = $_SESSION["login_tym"] ;
        $emp_id =  $_SESSION["empid"] ;
        
        $sql = "select * from log_details where login_tym ='$login_tym' and user ='$emp_id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $action = $row['action'];
        $form = $row['form'];

        $t1 = $action.",updated placement_details";
        $t2 = $form.", placement_details";


        $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and user ='$emp_id'";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('placement details updated Successfully')</script>";
        } 
        else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }

}


?>


<h2 class="ms-3 mt-2"><b>Placement</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">

<form method="POST" action="" enctype="multipart/form-data">
<div class="row mt-3">
<div class="col-md-4">
 <label for="name" class="form-label">Year</label>
 <input type="text" class="form-control" name="year" id="datepicker"  value="<?php echo $batch;?>"/>
 </div>


 <div class="col-md-4">
<label for="company_title" class="form-label ">Company Title</label>
<input type="text " class="form-control" id="company_title" name="company_title" value="<?php echo $company_title;?>">
</div>

    <div class="col-md-2">
    <label for="count" class="form-label ">No. of. Students</label>
    <input type="text " class="form-control" id="count" name="count" value="<?php echo $count;?>">
    </div>
</div>


<div class="row mt-2" id="roll">

</div>

<button type="button" class="btn btn-primary btn-lg mt-4 mb-4 " id="addbt" name="Addbt">Add Student </button>
<button type="Submit" class="btn btn-primary btn-lg mb-4 mt-4 ms-4" name="submit">Submit</button>

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




