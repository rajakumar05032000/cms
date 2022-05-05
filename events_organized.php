<?php
include 'db_conn.php';
include 'appsidebar.php';
?>
 <div class="row mt-2">
<div class="col">
<h4 class="text-center">Events Organized</h4>
</div>
</div>
<div class="row mt-3">
     <div class="col-md-2">
    <label for="name" class="form-label ">Type</label>
    <select  id="name_of_the_award" class="form-select" name="name_of_the_award">
    <option selected="">Choose...</option>
    <option value="Conference">Conference</option> 
    <option value="Seminar">Seminar</option>
    <option value="Workshop">Workshop</option>
    </select>
    </div>

     <div class="col-md-3">
    <label for="" class="form-label ">Title</label>
    <input type="text " class="form-control" id=" " name=" ">
    </div>

     <div class="col-md-3">
    <label for="" class="form-label ">Description</label>
    <input type="text " class="form-control" id=" " name=" ">
    </div>

    <div class="col-md-2 pe-1">
    <label for="date" class="form-label">From</label>
    <input type="date" class="form-control" id="date" name="date"></div>

    <div class="col-md-2 pe-1">
    <label for="date" class="form-label">To</label>
    <input type="date" class="form-control" id="date" name="date"></div>
</div>

<div class="row mt-3">
    <div class="col-md-3">
    <label for="name" class="form-label">Gallery</label>
    <input type="file" class="form-control" id="hod's_image" name="hod's_image"></div>
</div>

<div class="row mt-2">
    <div class="col-md-12 text-center">
    <button type="Submit" class="btn btn-primary btn-lg mb-4 " name="submit">Submit</button>
    </div>
</div>






<?php
include 'endtags.php';
?>