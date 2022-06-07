<?php

include 'db_conn.php';

error_reporting(0);

session_start();

?>

<?php
include 'appsidebar.php'
?>
<h2 class="ms-3 mt-3"><b>Internship</b></h2>
    <div class="main-card m-3 card min-vh-75"  style="min-height:55%">
                        <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-7 mb-3">
                            <input type="text" class="form-control" id="myInput" name="search" placeholder="Search here" onkeyup="searchfunction()">
                            </div>
                            <div class="col-md-2   ">
                                <input type="button" class="btn btn-primary" name ="insert" value="insert" onclick="window.location.href='internship.php'">
                            </div>
                            
                        </div>    
                        <div class="table-responsive-sm">
                            <table class="mb-0 table table-hover" id="myTable">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Department Name</th>
                                    <th>Batch</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                             <?php
                                    $sql = "select * from internship";
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
                                    <td><?php echo $row["deptname"] ?></td>
                                    <td><?php echo $row["batch"] ?></td>
                                    <td>
                                        <a href="update_internship.php?id=<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></a>
                                        <a href="deleteinternship.php?id=<?php echo $row['id'] ?>"> <i class="bi bi-trash p-3 "></i></a>
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
  #internship_style
  {
    background-color: rgb(135,206,235);
  }
  </style>
</body>
</html>
