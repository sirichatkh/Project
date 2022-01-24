<?php
	/*
	session_start();
		if (isset($_POST['Login_btn'])) {
			*/
		$conn=mysqli_connect("localhost","root","","witthayawiphat");

		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die();
		}
/*
		$U_Email = ($_POST['U_Email']);
		$U_Password = md5($_POST['U_Password']);

		$sql = "SELECT * FROM user WHERE U_Email='".$U_Email."' AND U_Password='".$U_Password."' LIMIT 1 ";
		$results = mysqli_query($conn, $sql);

		if(mysqli_num_rows($results)==1){
 
			$row = mysqli_fetch_array($results);

			$_SESSION["U_ID"] = $row["ID"];
			$_SESSION["U_Email"] = $row["U_Email"];
			$_SESSION["U_Password"] = $row["U_Password"];

			if ($_SESSION["U_Email"] AND $_SESSION["U_Password"] == true){ 

			  Header("Location: Floorplan_Admin.php");

			}
			}else{

			echo "<script>";
				echo "alert(\" อีเมลหรือรหัสผ่านไม่ถูกต้อง\");"; 
				echo "window.history.back()";
			echo "</script>";
		}
	}
	*/

	// 	if (mysqli_num_rows($results) == 1) { // user found
	// 	// check if user is admin or user
	// 		$logged_in_user = mysqli_fetch_assoc($results);
	// 		if ($logged_in_user['U_ID'] == 'U0001') {

	// 		$_SESSION['user'] = $logged_in_user;
	// 		$_SESSION['success']  = "ยินดีต้อนรับ";
	// 		header('location: Home_Admin.php');		  
	// 		} else {
	// 		array_push($errors, "อีเมลหรือรหัสผ่านผิด กรุณาลองให้อีกครั้ง");
	// 		}
	// 	}
	// }


$sql = "SELECT * FROM user WHERE U_Username= '$_POST[U_Username]' AND U_Password= '$_POST[U_Password]' " ; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  echo "success";
} else {
  echo "fail";
}
$conn->close();

?>