<?php

include 'db_conn.php';

error_reporting(0);

session_start();

?>

<?php
include 'appsidebar.php'
?>
                        <div class="row">
                            <div class="col-sm-3">
                            <h3 class="card-title">View Form</h3>   
                            </div>
                            <div class="col-sm-7 mb-1">
                                <input type="text" class="form-control" id="myInput" name="search" placeholder="Stat typing Title ,to search" onkeyup="searchfunction()">
                            </div>
                            <div class="col-sm">
                                <input type="button" class="btn btn-primary float-right" name ="insert" value="insert" onclick="window.location.href='education_dashboard.php'">
                            </div>
                        
                            
                        </div>    
                        
                             <?php
                                    $sql = "select * from education";
                                    $result = mysqli_query($conn,$sql);
                                ?>
                                <?php
                                if(mysqli_num_rows($result) > 0){
                                    ?>
                                    <div class="table-responsive-sm">
                            <table class="mb-0 table table-hover" id="myTable">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Employee Id</th>
                                    <th>Department Code</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <th scope="row"> <?php echo $i ?> </th>
                                    <td><?php echo $row["faculty_code"] ?></td>
                                    <td><?php echo $row["department_code"] ?></td>
                                    <td>
                                        <a href="updateeducation.php?id=<?php echo $row['faculty_code'] ?>"><i class="bi bi-pencil-square"></i></a>
                                        <a href="deleteeducation.php?id=<?php echo $row['faculty_code'] ?>"> <i class="bi bi-trash p-3 "></i></a>
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


</body>
</html>
