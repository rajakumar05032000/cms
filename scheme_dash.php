<?php
include 'db_conn.php';
error_reporting(0);

session_start();
$sql = "create table if not exists scheme( id varchar(10) primary key,years varchar(100),
Sem_no varchar(50),
Departments varchar(50)";

$result = mysqli_query($conn,$sql);
$years = "";
$Sem_no = "";
$Departments = "";

$sql = "select * from scheme";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$years = $row['years'];
$Sem_no = $row['Sem_no'];
$Departments = $row['Departments'];

if (isset($_POST['submit'])) {

    $sql = "insert into education () values('1','1','1','1');";
    $result = mysqli_query($conn,$sql);

    $years = $_POST['years'];
    $Sem_no = $_POST['Sem_no'];
    $Departments = $_POST['Departments'];

    $sql = "update scheme set years ='$years',Sem_no='$Sem_no',Departments='$Departments' where id='1'";
    $result = mysqli_query($conn,$sql);
}
?>
<?php
include 'appsidebar.php'
?>
      <center>
        <h4>Scheme Form</h4>
      </center>
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
            <select onchange="myFunction()" id="Sem_no" class="form-select" name="Sem_no">
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
        </div>
        <div class="row">
          <div class="col">
            <label for="name" class="form-label mt-3">Departments</label>
            <select id="Departments" class="form-select" name="Departments" onchange="myFunction()">
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
          <div class="col">
            <label for="name" class="form-label mt-3">Theory</label>

          </div>
          <div class="col">
            <label for="name" class="form-label mt-3">Practicals</label>
          </div>
        </div> 

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
          <div class="col" id="theory_container"></div>
          <div class="col" id="practical_container"></div>
          <center><button type="Submit" class="btn btn-primary my-4" name="submit">Submit</button></center>
        </div>
      </form>
    </div>
  </div>
  </div>

  <script>

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

  </script>

</body>
<style>
    .form-label {
        font-size: 0.90rem;
    }
</style>
</html>
