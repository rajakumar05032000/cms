<?php
include 'db_conn.php';
include 'appsidebar.php';
?>

<div class="row mt-2">
<div class="col">
<h4 class="text-center">Student Publications</h4>
</div>
</div>

<div class="row">
 <div class="col-md-3">
<label for="" class="form-label ">Title</label>
<input type="text " class="form-control" id=" " name=" ">
</div>

 <div class="col-md-3">
<label for="name" class="form-label ">Journal</label>
<select  id="name_of_the_award" class="form-select" name="name_of_the_award">
<option selected="">Choose...</option>
<option value="IEEE ">IEEE</option> 
<option value="URE">URE</option>
<option value="CJJ">CJJ</option>
</select>
</div>

 <div class="col-md-2">
<label for="" class="form-label ">No. of. Students</label>
<input type="text " class="form-control" id="count" name="count">
</div>

 <div class="col-md-2">
<label for="" class="form-label ">Guide</label>
<input type="text " class="form-control" id=" " name=" ">
</div>

<div class="col-md-2 pe-1">
<label for="date" class="form-label">Date</label>
<input type="date" class="form-control" id="date" name="date"></div>
</div>

<div class="row mt-3" id="roll"></div>

<div class="row mt-3">
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