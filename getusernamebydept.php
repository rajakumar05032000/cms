

<?php
include 'db_conn.php';
$deptname = $_GET['q'];
$sql = "SELECT name FROM staff_details WHERE deptname='$deptname'";
$result = mysqli_query($conn, $sql);
echo "<option value=\"Select Staff\">Select Staff</option>";
while($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    echo "<option value=\"$name\">$name</option>";
}

?>

