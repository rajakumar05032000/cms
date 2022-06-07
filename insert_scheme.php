<?php
include 'db_conn.php';

error_reporting(0);

session_start();
$sql = "create table if not exists scheme(id int null auto_increment primary key,years varchar(50),
sem_no varchar(100),
department varchar(100),
theory varchar(100))";
$result = mysqli_query($conn, $sql);

if(isset($_POST['submit'])) {
  // $years = $_POST['years'];
  $sem_no = filter_input('submit', 'sem_no', FILTER_SANITIZE_STRING);
  // $department = $_POST['department'];
  $theory = $_POST['theory'];
$sql="insert into scheme(sem_no,theory) values('$sem_no','$theory')";

$result = mysqli_query($conn, $sql);
    if ($result){  
      try{
          $login_tym = $_SESSION["login_tym"] ;
          $emp_id =  $_SESSION["empid"] ;
          $sql = "select * from log_details where login_tym ='$login_tym' and emp_id ='$emp_id' ";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);

          $action = $row['action'];
          $form = $row['form'];

          $t1 = $action.",inserted scheme";
          $t2 = $form.", scheme form";


          $sql = "update log_details set action = '$t1', form = '$t2' where login_tym ='$login_tym' and emp_id ='$emp_id'";
          $result = mysqli_query($conn,$sql);
          echo '<div class="alert alert-success alert-dismissable" id="flash-msg" style="margin-top:70px">
              <h4>scheme added successfully</h4>
          </div>';
      } 
      catch(e)
      {
          echo e;     
      }
  }
}
// include 'db_conn.php';
// error_reporting(0);

// session_start();
// $sql = "create table if not exists scheme(years varchar(100), sem_no varchar(50), departments varchar(50),theory varchar(50))";
// $result = mysqli_query($conn,$sql);

// $years = "";
// $sem_no = "";
// $departments = "";
// $theory = "";
// $practical = "";

// if (isset($_POST['submit'])) {

//     // $sql = "insert into scheme values('1','1','1','1');";
//     // $result = mysqli_query($conn,$sql);

//     $years = $_POST['years'];
//     $sem_no = $_POST['sem_no'];
//     $departments = $_POST['departments'];
//     // $theory = $_POST['theory'];
//     // $practical =$_POST['practical'];


//     $sql = "insert into scheme values('$years','$sem_no','$departments')";
//     $result = mysqli_query($conn,$sql);
// }
// include 'db_conn.php';

// error_reporting(0);
    
// session_start();
    
// $sql = "create table if not exists scheme(id int not null auto_increment primary key,yearr varchar(100), semm varchar(50), departmentt varchar(50))";
// $result = mysqli_query($conn, $sql);
    
//     // $sql= "insert into announcement values(0,'0','0','0','0','0','0');";
    
//     // mysqli_query($conn, $sql);
    
// if (isset($_POST['submit'])) {
    
//     $year = $_POST['years'];
//     $sem = $_POST['sem_no'];
//     $department = $_POST['departments'];
//     $sql ="insert into scheme(yearr,semm,department) values('$year','$sem','$department')";
    
//     $result = mysqli_query($conn, $sql);
//         if ($result) {
//             echo "<script>alert('scheme has been made Successfully')</script>";
//             } 
//         else {
//                 echo "<script>alert('Woops! Something Wrong Went.')</script>";
//             }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Colorlib Templates">
  <meta name="author" content="Colorlib">
  <meta name="keywords" content="Colorlib Templates">

  <!-- Title Page-->
  <title>Registration-Form</title>

  <!-- Icons font CSS-->
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <!-- Font special for pages-->
  <link
    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="vendor/select2/reg/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/reg_main.css" rel="stylesheet" media="all">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/staff_register.css">
  <link href="./main.css" rel="stylesheet">
</head>

<?php
include 'appsidebar.php'
?>
               
        <h2 class="ms-3"><b>Scheme Form</b></h2>
        <div class="main-card m-3 card min-vh-50" style="min-height:60%">
                            <div class="card-body">
      <form method="POST" action="">
        <div class="row">
          <div class="col">
            <label for="name" class="form-label mt-3">Years</label>
            <select id="Years" class="form-select" name="years" onchange="myFunction()">
              <option value="null" selected>Choose..</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
            </select>

          </div>
          <div class="col">
            <label for="name" class="form-label mt-3">Sem no</label>
            <select onchange="myFunction()" id="Sem_no" class="form-select" name="sem_no">
              <option value="null" selected>Choose..</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>


            </select>
          </div>
        
          <div class="col">
            <label for="name" class="form-label mt-3">Departments</label>
            <select id="Departments" class="form-select" name="department" required>
              <option value="null" selected>Choose..</option>
              <option value="Mechanical Engineering">Mechanical Engineering</option>
              <option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
              <option value="Mechatronics">Mechatronics</option>
              <option value="Computer Engineering">Computer Engineering</option>
              <option value="Computer Networking">Computer Networking</option>
              <option value="Apparel Technology">Apparel Technology</option>
              <option value="Textile Technology">Textile Technology</option>
              <option value="Foundry Technology">Foundry Technology</option>
            </select>
          </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <label for="name" class="form-label mt-3">Theory</label>
            <input type="text" class="form-control" id="theory" name="theory" required="required">
            </div>
            <div class="col-md-3">
            <label for="name" class="form-label mt-3">practical</label>
            <input type="text" class="form-control" id="practical" name="practical">
            </div>
        </div>
        <!-- <div class="row">
          <div class="col">
            <label for="name" class="form-label mt-3">Theory</label>

          </div>
          <div class="col">
            <label for="name" class="form-label mt-3">Practicals</label>
          </div>
        </div> -->

        <!-- <div class="row">
          <div class="col">
            <label for="name" class="form-label mt-3">No of Subjects</label><br>
            <input type="text" class="form-control " id="noofsubs1_code" name="noofsubs1_code"><br>

          </div>

          <div class="col">
            <label for="name" class="form-label mt-3">No of Subjects</label>
            <input type="text" class="form-control " id="noofsubs2_code" name="noofsubs_code">
          </div>
        </div> -->
        <div class="row mb-2" id="subjectContainer">
          <!-- <div class="col-md-3">
            <label for="name" class="form-label mt-0">Subject 3</label>
            <input type="text " class="form-control" id="sub_3" name="sub_3">
          </div> -->
         
          <div class="col-md-3" id="practical_container">
          <button type="Submit" class="btn btn-primary my-4" name="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
  </div>

  <script>
    let container1 = document.getElementByClass("row")
    let boxarr = []
    function addBox (t,p) {
      for(let i =0;i<=t;i++){
        boxarr[i] = document.createElement('input')
        boxarr[i].type = 'text'
        boxarr[i].id = `name${i}`
        container1.appendChild(boxarr[i])
      }
    }

    const subjectData = {
      2019:
        [
          {
            semNo: 1, //Sem Number
            mechanical_engineering: {
              subjects: {
                theory: [
                  "big data",
                  "cyber",
                  "dbms",
                ],
                practical: [
                  "phy",
                  "che",
                ]
              }
            },
            electrical_and_electronics_engineering: {
              subjects: {
                theory: [
                  "bkdihi",
                  "Sgbdx",
                ],
                practical: [
                  "fbssbsx",
                  "hrgsg",
                ]
              }
            },
            software_technology: {
              subjects: {
                theory: [
                  "kiufu",
                  "lihyj",
                ],
                practical: [
                  "kugs",
                  "iofxn",
                ]
              }
            },
            apparel_technology: {
              subjects: {
                theory: [
                  "dfghj",
                  "Solkjg",
                ],
                practical: [
                  "Sjkghg",
                  "dfgh",
                ]
              }
            },
        },
          {
            semNo: 2, //Sem Number
            mechanical_engineering: {
              subjects: {
                theory: [
                  "big data",
                  "cyber",
                  "dbms",
                ],
                practical: [
                  "phy",
                  "che",
                ]
              }
            },
            electrical_and_electronics_engineering: {
              subjects: {
                theory: [
                  "bkdihi",
                  "Sgbdx",
                ],
                practical: [
                  "fbssbsx",
                  "hrgsg",
                ]
              }
            },
            software_technology: {
              subjects: {
                theory: [
                  "kiufu",
                  "lihyj",
                ],
                practical: [
                  "kugs",
                  "iofxn",
                ]
              }
            },
            apparel_technology: {
              subjects: {
                theory: [
                  "dfghj",
                  "Solkjg",
                ],
                practical: [
                  "Sjkghg",
                  "dfgh",
                ]
              }
            },},
            {
            semNo: 3, //Sem Number
            mechanical_engineering: {
              subjects: {
                theory: [
                  "big data",
                  "cyber",
                  "dbms",
                ],
                practical: [
                  "phy",
                  "che",
                ]
              }
            },
            electrical_and_electronics_engineering: {
              subjects: {
                theory: [
                  "bkdihi",
                  "Sgbdx",
                ],
                practical: [
                  "fbssbsx",
                  "hrgsg",
                ]
              }
            },
            software_technology: {
              subjects: {
                theory: [
                  "kiufu",
                  "lihyj",
                ],
                practical: [
                  "kugs",
                  "iofxn",
                ]
              }
            },
            apparel_technology: {
              subjects: {
                theory: [
                  "dfghj",
                  "Solkjg",
                ],
                practical: [
                  "Sjkghg",
                  "dfgh",
                ]
              }
            },},
            {
            semNo: 4, //Sem Number
            mechanical_engineering: {
              subjects: {
                theory: [
                  "big data",
                  "cyber",
                  "dbms",
                ],
                practical: [
                  "phy",
                  "che",
                ]
              }
            },
            electrical_and_electronics_engineering: {
              subjects: {
                theory: [
                  "bkdihi",
                  "Sgbdx",
                ],
                practical: [
                  "fbssbsx",
                  "hrgsg",
                ]
              }
            },
            software_technology: {
              subjects: {
                theory: [
                  "kiufu",
                  "lihyj",
                ],
                practical: [
                  "kugs",
                  "iofxn",
                ]
              }
            },
            apparel_technology: {
              subjects: {
                theory: [
                  "dfghj",
                  "Solkjg",
                ],
                practical: [
                  "Sjkghg",
                  "dfgh",
                ]
              }
            },},
            {
            semNo: 5, //Sem Number
            mechanical_engineering: {
              subjects: {
                theory: [
                  "big data",
                  "cyber",
                  "dbms",
                ],
                practical: [
                  "phy",
                  "che",
                ]
              }
            },
            electrical_and_electronics_engineering: {
              subjects: {
                theory: [
                  "bkdihi",
                  "Sgbdx",
                ],
                practical: [
                  "fbssbsx",
                  "hrgsg",
                ]
              }
            },
            software_technology: {
              subjects: {
                theory: [
                  "kiufu",
                  "lihyj",
                ],
                practical: [
                  "kugs",
                  "iofxn",
                ]
              }
            },
            apparel_technology: {
              subjects: {
                theory: [
                  "dfghj",
                  "Solkjg",
                ],
                practical: [
                  "Sjkghg",
                  "dfgh",
                ]
              }
            },},
            {
                semNo: 6, //Sem Number
                mechanical_engineering: {
                subjects: {
                    theory: [
                    "big data",
                    "cyber",
                    "dbms",
                    ],
                    practical: [
                    "phy",
                    "che",
                    ]
                }
                },
                electrical_and_electronics_engineering: {
                subjects: {
                    theory: [
                    "bkdihi",
                    "Sgbdx",
                    ],
                    practical: [
                    "fbssbsx",
                    "hrgsg",
                    ]
                }
                },
                software_technology: {
                subjects: {
                    theory: [
                    "kiufu",
                    "lihyj",
                    ],
                    practical: [
                    "kugs",
                    "iofxn",
                    ]
                }
                },
                apparel_technology: {
                subjects: {
                    theory: [
                    "dfghj",
                    "Solkjg",
                    ],
                    practical: [
                    "Sjkghg",
                    "dfgh",
                    ]
                }
                }
                    },
        ],
    }

    function myFunction() {
      const year = parseInt(document.getElementById("Years").value);
      const semNo = parseInt(document.getElementById("Sem_no").value);
      const dept = document.getElementById("Departments").value.toLowerCase().split(" ").join("_");
      const subjectContainer = document.getElementById("subjectContainer")
      const theoryContainer = document.getElementById("theory_container")
      theoryContainer.innerHTML = "";  
      const practicalContainer = document.getElementById("practical_container")
      practicalContainer.innerHTML = "";  

      // console.log(subjectData[year][semNo-1][dept].subjects)

      if (year != "null" && semNo != "null" && dept != "null") {
        const subjects = subjectData[year][semNo - 1][dept].subjects;

        subjects.theory.forEach((element, index) => {
          const ROW = document.createElement("div")
          ROW.className = "col-md-3";

          const LABEL = document.createElement("label");
          LABEL.className = "form-label mt-0";
          LABEL.htmlFor = "name";
          LABEL.innerHTML = "Subject " + (index + 1);

          const P = document.createElement("p");
          P.innerHTML = element;

          ROW.appendChild(LABEL)
          ROW.appendChild(P)
          theoryContainer.appendChild(ROW)
        });
        
        subjects.practical.forEach((element, index) => {
          const ROW = document.createElement("div")
          ROW.className = "col-md-3";

          const LABEL = document.createElement("label");
          LABEL.className = "form-label mt-0";
          LABEL.htmlFor = "name";
          LABEL.innerHTML = "Subject " + (index + 1);

          const P = document.createElement("p");
          P.innerHTML = element;

          ROW.appendChild(LABEL)
          ROW.appendChild(P)

          practicalContainer.appendChild(ROW)
        });
      }
    }

  </script>`
     <script>
        const alertBox = document.getElementById("flash-msg");
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);
    </script>

</body>
<style>
    .form-label {
        font-size: 0.90rem;
    }
</style>
<?php
include 'endtags.php'
?>
</html>
