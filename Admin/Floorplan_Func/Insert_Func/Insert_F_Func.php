<?php 
	session_start();

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
      // Check connectionY
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

    //$conn=mysqli_connect("localhost","root","","witthayawiphat");
    // echo "<script type='text/javascript'>alert('.$conn.');</script>";
    // if (mysqli_connect_errno()){
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //     die();
    
    /*$F_Image = '0';
   
    $dir = "Resouces/Image"
    $fileImage = $dir . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $fileImage)){
      echo "" . basename($_FILES["file"]["name"]) . "";
    } else {
      echo "";
    }
    */
    
  
    $F_Image = '0';
    $F_Name = $_POST['F_Name'];

        $sql = "INSERT INTO floorplan (F_Image, F_Name)
        VALUES ($F_Image, $F_Name)";
        if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเเผนผังชั้นเรียบร้อยเเล้ว');
        window.location = '../../Floorplan_Admin.php';
        </script>";
        } else {
        echo "<script type='text/javascript'>alert('ไม่สามารถเพิ่มข้อมูลเเผนผังชั้นได้');
        window.location = '../../Floorplan_Admin.php';
        </script>";
        }

        $conn->close();
       

    // $F_Image = "";
    // $F_Floor = "";
    // $id = 0;
    // $update = false;
    // $test = $_POST['insert'];
    
    // if (isset($_POST['insert'])) {
    //     $F_Image = $_POST['F_Image'];
    //     $F_Floor = $_POST['F_Floor'];
        
    //     mysqli_query($conn, "INSERT INTO floorplans (F_Image, F_Floor) VALUES ('$F_Image', '$F_Floor')"); 
    //     $_SESSION['message'] = "Address saved"; 
    //     header('location: Floorplans_Admin.php');
    //     }
    // }
?>