<?php
  $db_host = '127.0.0.1';
  $db_user = 'root';
  $db_password = '';
  $db_db = 'witthayawiphat';
  $db_port = 3306;

  $conn = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db,
	$db_port
  );
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "<script type='text/javascript'>alert('.$conn.');</script>";
$sql = "SELECT R_ID, R_Image, R_Number , R_Name ,	R_Description , R_Capacity  FROM rooms WHERE R_Number LIKE '%".$_POST["R_Search"]."%' OR R_Name LIKE '%".$_POST["R_Search"]."%' ";
$result = $conn->query($sql);
$sql2 = "SELECT *  FROM floorplans WHERE F_Floor LIKE '%".$_POST["R_Search"]."%' ";
$result2 = $conn->query($sql2);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "R_ID: " . $row["R_ID"]. " - R_Image: " . $row["R_Image"]. " - R_Number: " . $row["R_Number"]. " - R_Name: " . $row["R_Name"]. " - R_Description: " . $row["R_Description"]. " - R_Capacity: " . $row["R_Capacity"]."<br>";
  }
} 
if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "F_ID : " . $row["F_ID "]. " - F_Image: " . $row["F_Image"]. " - 	F_Floor: " . $row["	F_Floor"]."<br>";
  }
} 
else {
  echo "0 results";
}
$conn->close();
?>