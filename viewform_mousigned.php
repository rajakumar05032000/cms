<?php

include 'db_conn.php';

error_reporting(0);

session_start();

?>
<?php
include 'appsidebar.php';
?>
                            <h2 class="ms-3 mt-3"><b>Mou Signed-View</b></h2>  
                             
                            <div class="main-card m-3 card min-vh-50"style="min-height:60%">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-7 mb-3 mt-3  ms-3 ">
                            <input type="text" class="form-control" id="myInput" name="search" placeholder="Search Here..." onkeyup="searchfunction()">
                            </div>
                            <div class="col-md-2 mt-3">


                           
                                      <input type="button" class="btn btn-primary float-right" name ="Insert" value="Insert" onclick="window.location.href='insert_mousigned.php'">
                            </div>
                        
                            
                        </div>    
                        
                             <?php
                                    $sql = "select * from mousigned";
                                    $result = mysqli_query($conn,$sql);
                                ?>
                                <?php
                                if(mysqli_num_rows($result) > 0){
                                    ?>
                                    <div class="table-responsive-sm">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Mousigned id</th>
                                    <th>Organization</th>
                                    <th>Description</th>
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
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["collaboratingg"] ?></td>
                                    <td><?php echo $row["descriptionn"] ?></td>
                                    <td>
                                        <a href="update_mousigned.php?id=<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></a>
                                        <a href="deletemousigned.php?id=<?php echo $row['id'] ?>"> <i class="bi bi-trash p-3 "></i></a>
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
                            else{
                              ?>
                              <table class="mb-0 table table-hover" id="myTable">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Mousigned id</th>
                                    <th>Organization</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
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
  #mou_style
  {
    background-color: rgb(135,206,235);
  }
  </style>

</body>
</html>