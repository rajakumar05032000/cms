<?php

include 'db_conn.php';

error_reporting(0);

session_start();


if (!isset($_SESSION['empid']) && $_SESSION['designation']!='Admin') {
  header("Location: new_login.php");
}


?>

<?php
include 'appsidebar.php'
?>
<h2 class="ms-3 mt-3"><b>Log Details</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-7 mb-3">
                            <input type="text" class="form-control" id="myInput" name="search" placeholder="Search here" onkeyup="searchfunction()">
                            </div>
                            
                            
                        </div>    
                        <div class="table-responsive-sm">
                            <table class="mb-0 table table-hover" id="myTable">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Emp_id</th>
                                    <th>Login Time</th>
                                    <th>Logout Time</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                             <?php
                                    $sql = "select * from log_details";
                                    $result = mysqli_query($conn,$sql);
                                ?>
                                <?php
                                if(mysqli_num_rows($result) > 0){
                                    ?>
                                 
                                <?php
                                $i=1;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <th scope="row"> <?php echo $i ?> </th>
                                    <td><?php echo $row["user"] ?></td>
                                    <td><?php echo $row["login_tym"] ?></td>
                                    <td><?php echo $row["logout_tym"] ?></td>
                                    <td>
                                        <a href="detailed_log.php?id=<?php echo $row['id'] ?>"><i class="bi bi-clipboard2-fill"></i></a>
    
                                    </td>

                                </tr>
                                <?php
                                $i++;
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                        </div>
                      </div>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>

<script>

function searchfunction() {
  
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<style>
  #log_style
  {
    background-color: rgb(135,206,235);
  }
  </style>

</body>
</html>
