<?php
include 'db_conn.php';
include 'appsidebar.php';
?>

<div class="row mt-2">
<div class="col">
    <h4 class="text-center">Internship</h4>
</div>   
</div>

<div class="row mt-3">

<div class="col-md-2">
    <label for="name" class="form-label">Batch</label>
    <input type="text" class="form-control" name="datepicker" id="datepicker" />
</div>

 <div class="col-md-3">
<label for="Description" class="form-label ">Description</label>
<input type="text " class="form-control" id=" Description" name=" Description">
</div>


<div class="col-md-3">
<label for="name" class="form-label">Image</label>
<input type="file" class="form-control" id="hod's_image" name="hod's_image">
</div>

<div class="col-md-3">
<label for="name" class="form-label">Upload PDF</label>
<input type="file" class="form-control" id="hod's_image" name="hod's_image"></div>

</div>

<div class="row mt-3">
     <div class="col-md-3">
    <label for="name" class="form-label ">Type</label>
    <select  id="name_of_the_award" class="form-select" name="name_of_the_award">
    <option selected="">Choose...</option>
    <option value="Internsip">Internsip</option> 
    <option value="Industrial Visit">Industrial Visit</option>
    </select>
    </div>

     <div class="col-md-2">
    <label for="count" class="form-label ">No. of. Students</label>
    <input type="text " class="form-control" id="count" name="count">
    </div>
</div>

<div class="row mt-5" id="roll">

</div>

<div class="row mt-4">
<div class="col-md-12 text-center">
<button type="Submit" class="btn btn-primary btn-lg mb-4 " name="submit">Submit</button>
</div>
</div>




<?php
include 'endtags.php';
?>



<script>
$("#count").on('change',()=>{
   var a = document.getElementById("count").value;
   var txt = '<div class="row mt-3 "><div class="col-md-3"><label for="" class="form-label ">Name</label><input type="text " class="form-control"'
   var rol = '<div class="col-md-3"><label for="" class="form-label ">Roll no</label><input type="text " class="form-control"'
   for(i=a;i>0;i--)
   { 
       txt2 = txt + 'id="sname'+i+'" name="sname'+i+'"></div>'+rol+'id="srol'+i+'" name="srol'+i+'" </div>';
    $("#roll").prepend(txt2);
   }
})
</script>

