<?php
include 'db_conn.php';

error_reporting(0);

session_start();

$a_id = $_GET['id'];

if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Admin') {
    header("Location: new_login.php");
}



$sql = "select * from log_details where id='$a_id'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);




?>

<?php
include "appsidebar.php"
?>


<h2 class="ms-3"><b>Log Details</b></h2>
                        <div class="main-card m-3 card min-vh-75" style="min-height:50%" style="min-height:60%">
                        <div class="card-body">
                        
                    <form method="POST" action="" class="mx-2">
                        <div class="row">
                                <div class="col">
                                    <label for="name" class="form-label mt-3">Emp_id</label>
                                    <input type="text" class="form-control " id="from" name="from" value="<?php echo $row['user'] ?>" disabled>
                                </div>
                                <div class="col">
        
                                    <label for="name" class="form-label mt-3">Login Time</label>
                                    <input type="text" class="form-control " id="to" name="to" value="<?php echo $row['login_tym'] ?>" disabled>
                                </div>
                                <div class="col">
                                    <label for="name" class="form-label mt-3">Logout Time</label>
                                    <input type="text" class="form-control " id="Date_of_the_Event" name="Date_of_the_Event" value="<?php echo $row['logout_tym'] ?>" disabled>
                                </div>
                        </div>
                        
                            <div class="table-responsive-sm">
                            <table class="mb-0 table table-hover" id="myTable">
                                <thead>
                                <tr>
                                    <th>Form</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                        
                            <?php
                            $form_details = $row['form'];
                            $action_details = $row['action'];

                            $form_array = explode(',', $form_details);
                            $action_array = explode(',', $action_details);
                            $i = 0;
                            while($i < count($form_array))
                            {
                            ?>
                                <tr>
                                    
                                    <td><?php echo $form_array[$i] ?></td>
                                    <td><?php echo $action_array[$i] ?></td>
                                </tr>
                                <?php
                                $i++;
                            }?>

                        
                               <a href="viewform_log.php"> <button type="button" class="btn btn-primary mt-4 mb-4" name="submit" >Back</button></a>
                    
                </form></div>


                </div>
            </div>
        </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>

<style>
    #log_style
  {
    background-color: rgb(135,206,235);
  }
  </style>

</body>
    </html>

    <?php
    include "endtags.php";
    ?>
    